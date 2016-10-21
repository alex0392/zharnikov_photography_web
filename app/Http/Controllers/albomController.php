<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\TranslateClient;
use App\Http\Requests;

use App\Models\Albom;
use App\Models\Photo;
use File;
use Response;
class albomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albom= new Albom;      
        return $albom::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTypeAlbom()
    {
        $albom=new Albom;
        return $albom::select('albom_type','link')->groupBy('albom_type')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $albom= new Albom; 
        $tr = new TranslateClient(null, 'en');
        $name=$request->all();
        $trAlbomName=str_slug($tr->translate($name['nameAlbom']));

        if(isset($name['typeAlbomList'])){
            $albom->albom_type=$name['typeAlbomList'];
            $trAlbomType=str_slug($tr->translate($name['typeAlbomList']));
            $albom->link= $trAlbomType.'/'.$trAlbomName;
        }else{
            $albom->albom_type=$name['newTypeAlbom'];
            $trAlbomType=str_slug($tr->translate($name['newTypeAlbom']));
            $albom->link=$trAlbomType.'/'.$trAlbomName;
        }
        $albom->albom_name=$name['nameAlbom'];
        $albom->save();
        return redirect('/admin/albom');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $albom= new Albom;
        return $albom::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request,$id)
    {
        $albom=new Albom;
        $triger=$request->all();
        $success=$albom::where('id',$id)->update(['home_page'=>$triger['triger']]);
        if ($success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $albom=new Albom;
        $albomName=$request->nameAlbom;
        /* update alboms databases */
        $albom::where('id',$id)->update(['albom_name'=>$albomName]);
        return redirect('/admin/albom/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $albom=new Albom;
        $photo=new Photo;
        
        $photoArrDB=$photo::where('albom',$id)->get();
        //dd($photoArr[0]->name);
        if(count($photoArrDB)>0){
            //dd($photoArrDB);
            for ($i=0; $i < count($photoArrDB); $i++) { 
                $photoArr[$i]='gellery/'.$photoArrDB[$i]->name;
            }
            //dd($photoArr);
            File::delete($photoArr);
            $photo::where('albom',$id)->delete();    
        }
        $albom::where('id',$id)->delete();
        return redirect('/admin/albom');
    }
}
