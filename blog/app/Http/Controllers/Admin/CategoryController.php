<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * 首页
     */
    public function index(){
        $data = (new Category)->tree();
        return view( "admin.category.index" )->with( 'data',$data );
    }

    public function changeOrder()
    {
        $input = Input::all();
        $cate = Category::find( $input['id'] );
        $cate['cate_order'] = $input['cate_order'];
        $result = $cate->update();
        if( $result ){
            $data = array(
                'code' => '0',
                'msg' => '分类排序更新成功',
            );
        }else{
            $data = array(
                'code' => '1',
                'msg' => '分类排序更新失败',
            );
        }
        return $data;
    }

    /**
     * 创建分类方法
     */
    public function create(){
        $data = Category::where( 'cate_pid',0 )->get();
//        dd( $data );exit;
        return view( 'admin.category.create',compact( 'data' ) );
    }
    /**
     *
     */
    public function store(){
        $input = Input::except( '_token' );
        $rules = [
            'cate_name'     => 'required',
//            'cate_order'    => 'required',
        ];

        $validator = Validator::make( $input,$rules,[
            'cate_name.required'=>'分类名称不能为空！',
//            'cate_order.required'=>'请设置一下排序',
        ] );
        if( $validator->passes() ){
            $result = Category::create( $input );
            if( $result ){
                return redirect( 'admin/category' );
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
    public function edit( $cate_id )
    {
        $field = Category::find( $cate_id );
        $data = Category::where( 'cate_pid',0 )->get();
        return view( 'admin.category.edit',compact( 'field','data' ) );
    }

    /**
     * 更新的方法
     */
    public function update( $cate_id ){
        $input =  Input::except( '_token','_method' );
        $result = Category::where( 'id',$cate_id )->update( $input );
        if( $result ){
            return redirect( 'admin/category' );
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
    public function destroy( $cate_id ){
        $result = Category::where( 'id',$cate_id )->delete();
        Category::where( 'cate_pid',$cate_id )->update( ['cate_pid'=>0] );
        if( $result ){
            $data = [
                'code'=>0,
                'msg'=>'删除成功',
            ];
        }else{
            $data = [
                'code'=>1,
                'msg'=> '网络延迟，请稍后再试！',
            ];
        }
        return $data;
    }




}
