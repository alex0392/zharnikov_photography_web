<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Response;
use App\Models\Photo;
use App\Models\Albom;
use File;
class photoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo=new Photo;
        return $photo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $photo=new Photo;
        $input = $request->all();

        $rules = array(
            'file' => 'image|max:13000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Response::make($validation->errors->first(), 400);
        }

        $destinationPath = 'gellery'; // upload path
        $extension = $request->file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = $request->file('file')->move($destinationPath, $fileName); // uploading file to given path
        $photo->name=$fileName;
        $photo->albom=$id;
        $photo->save();
        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo=new Photo;
        return $photo::where('albom',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $photo=new Photo;
        $triger=$request->all();
        $success=$photo::where('id',$id)->update(['homePage'=>$triger['triger']]);
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

     *Update avatar albom
     */
    public function update(Request $request, $id)
    {
        $albom=new Albom;
        $photo=new Photo;
        $albomID=$id;
        $photoName=$request->photoName;
        /* update alboms databases */
        $albom::where('id',$albomID)->update(['avatar'=>$photoName]);
        /* update photos databases */
        $photo::where('name',$photoName)->update(['avatarAlbom'=>$albomID]);
        return redirect('/admin/albom/'.$albomID);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $photo=new Photo;
        $photoName=$request->photoName;
        File::delete('gellery/'.$photoName);
        $photo::where('id',$id)->delete();
        $albom=$request->albomId;
        return redirect('/admin/albom/'.$albom);
    }
}
