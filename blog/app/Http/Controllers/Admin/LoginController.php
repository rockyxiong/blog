<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;

use App\Http\Model\Users;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


use App\Http\Requests;
require_once "resources/org/code/Code.class.php";

class LoginController extends CommonController
{
	protected $obj;
	public function __construct(){
		$this->obj = new \Code();
	}
	public function login(){
		if($input = Input::all()){
			$_code = $this->obj->get();
			if(strtoupper($input['code'])!=$_code ){
				return back()->with('msg','验证码错误');
			}
			$user = Users::first();
			if($user->user_name != $input['user_name'] && Crypt::decrypt($user->user_pass) != $input['user_pass']){
				return back()->with('msg','密码或者用户名错误！');
			}
			session(array('user'=>$user));
			return redirect('admin/index');
		}else{
			return view('admin.login');
		}
		
	}
	
	/**
	 * 退出
	 * Enter description here ...
	 */
	public function logout(){
		session(array('user'=>null));
		return redirect('admin/login');
	} 
	
	/**
	 * 修改密码
	 * Enter description here ...
	 */
	public function pass(){
		if($input = Input::all()){
			$rules = array(
				'password'=>'required|between:6,20|confirmed'
			);
			$massage = array(
				'password.required'=>'新密码不能为空',
			    'password.between'=>'新密码必须在6到20位之间',
			    'password.confirmed'=>'新密码和确认密码不一致',
			);
			$validator = Validator::make($input,$rules,$massage);
			if($validator->passes()){
				$user = Users::first();
				$_password = Crypt::decrypt($user->user_pass);
				//var_dump($_password);
				//var_dump($input['password']);exit;
				
				if($input['password_o'] == $_password){
				     $user->user_pass = Crypt::encrypt($input['password']);
				     $user->update();
				     return back()->with('errors','密码修改成功！');
				}else{
					 return back()->with('errors','原密码错误！');
				}
			}else{
				return back()->withErrors($validator);
				//dd($validator->errors()->all());
			}
		}
		return view('admin.pass');
	}
	public function code(){
		$code = $this->obj->make();
	}
	
	public function crypy(){
		$str = '123456';
		
		$str2 = Crypt::encrypt($str);
		echo count($str);
	}
}
