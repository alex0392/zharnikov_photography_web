<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Albom;
use App\Models\Photo;
use App\Http\Controllers\albomController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\aboutController;
use Stichoza\GoogleTranslate\TranslateClient;

use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo= new Photo;
        $photoList=$photo::where('homePage','1')->get();
        $data=[
            'photoList'=>$photoList,
            'title'=>'Vladislav Zharnikov'
        ];
        return view('home',$data);
    }

    public function portfolio()
    {
        $albom= new AlbomController;
        $albomList=$albom->index();
        $albomTypeList=$albom->showTypeAlbom();

        $data=[
            'albomList'=>$albomList,
            'albomTypeList'=>$albomTypeList,
            'title'=>'Портфолио'
        ];

        return view('page.portfolio',$data);
    }

    public function alboms($type,$albom=null)
    {

        $albomCtrl= new AlbomController;
        $photoCtrl= new photoController;
        $albomTypeList=$albomCtrl->showTypeAlbom();


        if($albom!=null){
            $albomModel= new Albom;
            $link=$type.'/'.$albom;
            $albomList= DB::select('SELECT * FROM alboms WHERE link LIKE "%'.$albom.'"');
            $id=$albomList[0]->id;
            $name=$albomList[0]->albom_name;
            $photoList=$photoCtrl->show($id);
            $data=[
                'photoList'=>$photoList,
                'albomTypeList'=>$albomTypeList,
                'title'=>$name
            ];
            return view('page.albom',$data);           
        }
        $albomList= DB::select('SELECT * FROM alboms WHERE link LIKE "'.$type.'%"');
        $title=$albomList[0]->albom_type;
        $data=[
            'albomList'=>$albomList,
            'albomTypeList'=>$albomTypeList,
            'title'=>$title
        ];
        return view('page.portfolio',$data); 
    }

    public function about()
    {
        
        $about= new aboutController;
        $albomCtrl= new AlbomController;
        $albomTypeList=$albomCtrl->showTypeAlbom();
        $content=$about->index();
        $data=[
                'content'=>$content,
                'albomTypeList'=>$albomTypeList,
                'title'=>'Обо мне'
        ];
        return view('page.about',$data);
    }

    public function contact()
    {
        $albomCtrl= new AlbomController;
        $albomTypeList=$albomCtrl->showTypeAlbom();
        $data=[
            'albomTypeList'=>$albomTypeList,
            'title'=>'Контакты'
        ];
        return view('page.contact',$data);
    }
}
