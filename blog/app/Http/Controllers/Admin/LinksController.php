<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\DomCrawler\Link;

class LinksController extends Controller
{
    /**
     * 首页
     */
    public function index(){
        $data = Links::orderBy( 'link_order','asc' )->get();
        return view( 'admin.links.index',compact( 'data' ) );
    }

    /**
     * @return array
     * 更改排序
     */
    public function changeOrder()
    {

        $input = Input::all();
        $links = Links::find( $input['id'] );
        $links['link_order'] = $input['link_order'];
        $result = $links->update();
        if( $result ){
            $data = array(
                'code' => '0',
                'msg' => '友情链接排序更新成功',
            );
        }else{
            $data = array(
                'code' => '1',
                'msg' => '友情链接分类排序更新失败',
            );
        }
        return $data;
    }

    /**
     * 创建分类方法
     */
    public function create(){

        return view( 'admin.links.create');
    }
    /**
     * 创建链接的保存方法
     */
    public function store(){
        $input = Input::except( '_token' );
        $rules = [
            'link_name'   => 'required',
            'link_url'    => 'required',
        ];

        $validator = Validator::make( $input,$rules,[
            'link_name.required'=>'链接名称不能为空！',
            'link_url.required' =>'链接地址不能为空',
        ] );
        if( $validator->passes() ){
            $result = Links::create( $input );
            if( $result ){
                return redirect( 'admin/links' );
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
    public function edit( $link_id )
    {
        $field = Links::find( $link_id );
        return view( 'admin.links.edit',compact( 'field' ) );
    }

    /**
     * 更新的方法
     */
    public function update( $link_id ){
        $input =  Input::except( '_token','_method' );
        $result = Links::where( 'id',$link_id )->update( $input );
        if( $result ){
            return redirect( 'admin/links' );
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
    public function destroy( $link_id ){
        $result = Links::where( 'id',$link_id )->delete();
        if( $result ){
            $data = [
                'code'=>0,
                'msg'=>'友情链接删除成功',
            ];
        }else{
            $data = [
                'code'=>1,
                'msg'=> '友情链接删除失败 ',
            ];
        }
        return $data;
    }
}
