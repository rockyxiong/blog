<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct(){
        $new = Article::orderBy( 'art_time','desc' )->take(8)->get();
        $click = Article::orderBy( 'art_view','desc' )->take(5)->get();
        $navs = Navs::all();
        View::share( 'navs',$navs );
        View::share( 'new',$new );
        View::share( 'click',$click );
    }
}
