<?php

namespace App\Http\Controllers\Admin;


use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    /**
     * 首页
     */
    public function index(){
        $data = Article::orderBy( 'id','desc' )->paginate(10);
        return view( "admin.article.index",compact( 'data' ) );

    }

    /**
     * 创建分类方法
     */
    public function create(){
        $data = (new Category)->tree();

        return view( 'admin.article.create',compact( 'data' ) );
    }
    /**
     * 保存文章方法
     */
    public function store(){
        $input = Input::except( '_token' );
        $input['art_time'] = time();

        $rules = [
            'art_title'     => 'required',
            'art_content'    => 'required',
        ];

        $validator = Validator::make( $input,$rules,[
            'art_title.required'=>'文章标题不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ] );
        if( $validator->passes() ){
            $result = Article::create( $input );
            if( $result ){
                return redirect( 'admin/article' );
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
    public function edit( $art_id )
    {

        $field = Article::find( $art_id );
        $data = (new Category)->tree();
        return view( 'admin.Article.edit',compact( 'field','data' ) );
    }

    /**
     * 更新的方法
     */
    public function update( $art_id ){
        $input =  Input::except( '_token','_method' );
        $result = Article::where( 'id',$art_id )->update($input);
        if( $result ){
            return redirect( 'admin/article' );
        }else{
            return back()->with( 'errors','网络延迟，请稍后再试！' );
        }
    }

    /**
     *  删除方法
     */
    public function destroy( $art_id ){
        $result = Article::where( 'id',$art_id )->delete();
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
