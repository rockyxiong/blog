<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use Carbon\Carbon;

class IndexController extends CommonController
{
    public function index()
    {
        //点击量最好的6个文章
        $hot = Article::orderBy( 'art_view','desc' )->take(6)->get();
        $click = Article::orderBy( 'art_view','desc' )->take(5)->get();
        //图文列表带分页
        $data = Article::orderBy( 'art_time','desc' )->paginate(5);
        //最新8个文章
        $new = Article::orderBy( 'art_time','desc' )->take(8)->get();
        //友情链接
        $links = Links::orderBy( 'link_order','asc' )->get();

        return view( 'home.index',compact( 'hot','click','new','data','links' ));
    }

    public function cate( $cate_id )
    {
        $field = Category::find( $cate_id );

        //图文列表带分页
        $data = Article::where( 'cate_id',$cate_id )->orderBy( 'art_time','desc' )->paginate(4);
        Category::where( 'id',$cate_id )->increment( 'cate_view' );
        //当前分类的子分类
        $submenu = Category::where( 'cate_pid',$cate_id )->get();

        return view( 'home.list',compact( 'field','data','submenu' ) );
    }

    public function article( $art_id )
    {
        $field = Article::Join( 'category','article.cate_id','=','category.id' )->where( 'article.id',$art_id )->first();
        Article::where( 'id',$art_id )->increment( 'art_view' );
        $art['pre'] = Article::where( 'id','<',$art_id )->orderBy( 'id','desc' )->first();
        $art['next'] = Article::where( 'id','>',$art_id )->orderBy( 'id','asc' )->first();
        $data = Article::where( 'cate_id',$field->cate_id )->orderBy( 'id','desc' )->take(6)->get();
        return view( 'home.new',compact( 'field','art','data' ) );
    }
}
