<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $document = Document::All();
        return view("official_document.document",['documents' => $document]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'release_date' => 'bail|required|date'  ,
        ]);

        $doc = Document::where('name',$request->name)->orWhere('release_date' ,$request->release_date)->first();
            
        
        if($doc){
            if(session()->get('locale'=='en'))
                return redirect()->back()->with('msg','Document exist !');
            else
                return redirect()->back()->with('msg','ملف موجود !');
        }else{
            $file_path = $request->file('file')->store('\document\upload',['disk' => 'my_files']);

            $data = $request->all();
            $data["file_path"]=$file_path;
           
            Document::create($data);
            return redirect("/documents");
        }
    }

    public function destroy($id){
        $doc = Document::find($id);
        $path = $doc->file_path;
        Storage::disk('my_files')->delete($path);
        Document::destroy($id);
        return response(['success' => true]);
    }

    public function see_document(Request $request){
        $path = public_path().$request->path;
        return response()->file($path);
    }
}
