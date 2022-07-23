<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        $files = File::all();
        return view("file.index")->with("files",$files);
    }
    public function create()
    {
        return view("file.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' =>"required|string|min:3|max:30",
            'description' =>"required|string|min:5",
            'fileInput' =>"required|max:81920|mimes:png,jpg,pdf"
        ]);
        $file = new File();
        $file->title = $request->title;
        $file->description = $request->description;
        $allFileData = $request->file("fileInput");
        $file_name = $allFileData->getClientOriginalName();
        $allFileData->move(public_path() . "/files/",$file_name);
        $file->file = $file_name;
        $file->save();
        return redirect("/file")->with("done","Add File Done");
    }
    public function show($id)
    {
        $file = File::find($id);
        return view("file.show")->with("file",$file);
    }
    public function edit($id)
    {
        $file = File::find($id);
        return view("file.edit")->with("file",$file);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        'title' =>"required|string|min:3|max:30",
        'description' =>"required|string|min:5",
        'fileInput' =>"required|max:81920|mimes:png,jpg,pdf"
    ]);
    $file = new File();
    $file->title = $request->title;
    $file->description = $request->description;
    $allFileData = $request->file("fileInput");
    $file_name = $allFileData->getClientOriginalName();
    $allFileData->move(public_path() . "/files/",$file_name);
    $file->file = $file_name;
    $file->save();
    return redirect("/file")->with("done","Update File Done");
    }
    public function destroy($id)
    {
        $emp = File::find($id);
        $emp->delete();
        return redirect('/file')->with("delete","Delete File Done");
    }
    public function download($id)
    {
        $file = File::where("id" , "=" , $id )->firstOrFail();
        $filePath = public_path() . "/files/" . $file->file ;
        return response()->download($filePath);
    }
}
