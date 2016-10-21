<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use App\Http\Controllers\albomController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\aboutController;
class adminController extends Controller
{
   public function index()
   {
   		$user=Auth::user();
		$userName=$user['name'];
		$data=[
			'title'=>'Панель администратора',
			'userName'=>$userName
		];
   		return view('admin.page.index', $data);
   }
       /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
   public function albom($id='')
   {

   		$albomController= new albomController;
   		$photoController= new photoController;

		$user=Auth::user();
		$userName=$user['name'];

		if(empty($id)){
			$albomList=$albomController->index();
			$albomTypeList=$albomController->showTypeAlbom();
			$data=[
				'title'=>'Альбомы',
				'userName'=>$userName,
				'albomList'=>$albomList,
				'albomId'=>$id,
				'albomTypeList'=>$albomTypeList,
			];
			return view('admin.page.albom',$data);
		}else{

			$albomList=$photoController->show($id);

			$titleAlbom=$albomController->show($id);

			$data=[
				'title'=>$titleAlbom[0]->albom_name,
				'userName'=>$userName,
				'photoList'=>$albomList,
				'albomId'=>$id
			];
			return view('admin.page.photo',$data);			
		}

   }

   public function newAlbom()
   {

		$user=Auth::user();
		$userName=$user['name'];

		$albomController= new albomController;
		$albomTypeList=$albomController->showTypeAlbom();

		$data=[
			'title'=>'Добавить новый альбом',
			'userName'=>$userName,
			'albomTypeList'=>$albomTypeList
		];
		return view('admin.page.newAlbom',$data);
   }

   public function addPhoto($id)
   {
		$user=Auth::user();
		$userName=$user['name'];
		$data=[
			'title'=>'Добавить новые фотографии',
			'userName'=>$userName,
			'albom'=>$id
		];
		return view('admin.page.newPhoto',$data);
   }
   public function about()
   {
		$user=Auth::user();
		$userName=$user['name'];
		$about= new aboutController;
		$content=$about->index();
		//dd($content);
		$data=[
			'title'=>'Обо мне',
			'userName'=>$userName,
			'content'=>$content
			
		];
		return view('admin.page.about',$data);
   }
   public function profile()
   {
		$user=Auth::user();
		$userName=$user['name'];

		$data=[
			'title'=>'Профиль администратора',
			'userName'=>$userName,
			'email'=>$user['email']

		];
		return view('admin.page.profile',$data);
   }
}
