<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    /**
     * 首页
     */
    public function index(){

        $data = Navs::orderBy( 'nav_order','asc' )->get();
        return view( 'admin.navs.index',compact( 'data' ) );
    }

    /**
     * @return array
     * 更改排序
     */
    public function changeOrder()
    {
        $input = Input::all();
        $navs = Navs::find( $input['id'] );
        $navs['nav_order'] = $input['nav_order'];
        $result = $navs->update();
        if( $result ){
            $data = array(
                'code' => '0',
                'msg' => '导航排序排序更新成功',
            );
        }else{
            $data = array(
                'code' => '1',
                'msg' => '导航排序排序更新失败',
            );
        }
        return $data;
    }

    /**
     * 创建分类方法
     */
    public function create(){

        return view( 'admin.navs.create');
    }
    /**
     * 创建链接的保存方法
     */
    public function store(){
        $input = Input::except( '_token' );
        $rules = [
            'nav_name'   => 'required',
            'nav_url'    => 'required',
        ];

        $validator = Validator::make( $input,$rules,[
            'nav_name.required'=>'导航名称不能为空！',
            'nav_url.required' =>'导航url不能为空',
        ] );

        if( $validator->passes() ){
            $result = Navs::create( $input );
            if( $result ){
                return redirect( 'admin/navs' );
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
    public function edit( $navs_id )
    {
        $field = Navs::find( $navs_id );
        return view( 'admin.navs.edit',compact( 'field' ) );
    }

    /**
     * 更新的方法
     */
    public function update( $navs_id ){
        $input =  Input::except( '_token','_method' );
        $result = Navs::where( 'id',$navs_id )->update( $input );
        if( $result ){
            return redirect( 'admin/navs' );
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
    public function destroy( $navs_id ){
        $result = Navs::where( 'id',$navs_id )->delete();
        if( $result ){
            $data = [
                'code'=>0,
                'msg'=>'自定义导航删除成功',
            ];
        }else{
            $data = [
                'code'=>1,
                'msg'=> '自定义导航删除失败 ',
            ];
        }
        return $data;
    }
}
