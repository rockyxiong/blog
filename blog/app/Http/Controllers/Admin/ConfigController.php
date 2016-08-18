<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    /**
     * 首页
     */
    public function index(){
        $data = Config::orderBy( 'conf_order','asc' )->get();
        foreach( $data as $k=>$v ){
            switch( $v->field_type ){
                case 'input':
                    $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value=" '.$v->conf_content .' " />';
                    break;
                case 'textarea':
                    $data[$k]->_html = '<textarea name="conf_content[]" class="lg">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    $arr = explode( ',',$v->field_value );
                    $str = '';
                    foreach( $arr as $m => $n ){
                        $re = explode( '|',$n );
                        $checked = $v->conf_content == $re[0] ? ' checked ' :'' ;
                        $str .= '<input type="radio" name="conf_content[]" value="'.$re[0].'" '.$checked.' />'.$re[1];
                    }
                    $data[$k]->_html = $str;
                    break;
            }
        }



        return view( 'admin.config.index',compact( 'data' ) );
    }

    /**
     * 更改配置项方法
     */
    public function changeContent(){
        $input = Input::all();
        foreach( $input['id'] as $k=>$v ){
            Config::where( 'id',$v )->update( ['conf_content'=>$input['conf_content'][$k]] );
        }
        $this->putFile();
        return back()->with( 'errors','配置项更新成功' );
    }

    /*
     * 把配置项放到配置文件内
     */
    public function putFile(){
        $config = Config::pluck( 'conf_content','conf_name' )->all();
        $path = base_path().'\config\web.php';
        $str = "<?php return ".var_export( $config,true ).";";
        file_put_contents( $path,$str );
    }

    /**
     * @return array
     * 更改排序
     */
    public function changeOrder()
    {

        $input = Input::all();
        $config = Config::find( $input['id'] );
        $config['conf_order'] = $input['conf_order'];
        $result = $config->update();
        if( $result ){
            $data = array(
                'code' => '0',
                'msg' => '配置项排序更新成功',
            );
        }else{
            $data = array(
                'code' => '1',
                'msg' => '配置项排序更新失败',
            );
        }
        return $data;
    }

    /**
     * 创建分类方法
     */
    public function create(){

        return view( 'admin.config.create');
    }
    /**
     * 创建链接的保存方法
     */
    public function store(){
        $input = Input::except( '_token' );
        $rules = [
            'conf_name'   => 'required',
            'conf_title'    => 'required',
        ];
        $validator = Validator::make( $input,$rules,[
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required' =>'配置项标题不能为空',
        ] );

        if( $validator->passes() ){
            $result = Config::create( $input );
            if( $result ){
                return redirect( 'admin/config' );
            }else{
                return back()->with( 'errors','网络延迟，请稍后再试！' );
            }
        }else{
            return back()->withErrors( $validator );
        }
    }

    /**
     * 编辑的方法
     */
    public function edit( $conf_id )
    {
        $field = Config::find( $conf_id );
        return view( 'admin.config.edit',compact( 'field' ) );
    }

    /**
     * 更新的方法
     */
    public function update( $conf_id ){
        $input =  Input::except( '_token','_method' );
        $result = Config::where( 'id',$conf_id )->update( $input );
        if( $result ){
            $this->putFile();
            return redirect( 'admin/config' );
        }else{
            return back()->with( 'errors','网络延迟，请稍后再试！' );
        }
    }


    /**
     *
     */
    public function show(){

    }

    /**
     *  删除方法
     */
    public function destroy( $conf_id ){
        $result = Config::where( 'id',$conf_id )->delete();
        if( $result ){
            $this->putFile();
            $data = [
                'code'=>0,
                'msg'=>'配置项删除成功',
            ];
        }else{
            $data = [
                'code'=>1,
                'msg'=> '配置项删除失败 ',
            ];
        }
        return $data;
    }
}
