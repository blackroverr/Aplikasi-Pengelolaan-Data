<?php

namespace App\Http\Controllers;

use App\Models\Filemanager;
use Illuminate\Http\Request;


class FilemanagerController extends Controller
{
    public function index()
    {
        return view('/pages/file-upload');
    }
    // save record
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg,mp4,mp3,docx,doc,pptx,ppt,sql'
            ]);
     
            if($request->hasfile('files'))
            {
                foreach($request->file('files') as $key => $file)
                {
                    $name = $file->getClientOriginalName();
                    $path = $file->move('public/files',$name);
    
                    $insert[$key]['name'] = $name;
                    $insert[$key]['path'] = $path;
    
                }
            }
     
            Filemanager::insert($insert);
     
            return redirect('file-manager-page')->with('status', 'File has been uploaded Successfully');
     
        }
}
