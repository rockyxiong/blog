<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    /**
     * 图片上传方法
     */
    public function upload(){

        $file = Input::file( 'Filedata' );
        if( $file->isValid() ){

            $entension = $file->getClientOriginalExtension();//上传文件的后缀

            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;//没后缀名的文件

            $path = $file->move( base_path().'/uploads/',$newName );//路径
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
