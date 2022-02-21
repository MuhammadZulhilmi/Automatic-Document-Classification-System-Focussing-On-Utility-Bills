<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;
use App\Models\User;

class DocumentController extends Controller
{
    public function index()
   {
   	
   	return view('welcome');

   }

   public function submitdoc()
   {
    return view('submitdoc');
   }


     public function store(Request $request)
   {
   		//return $request; to get data
        $data=new document();
		$file=$request->file; //requesting a file
		
        //name filename will be  in timestamps/time
	    $filename=time().'.'.$file->getClientOriginalExtension();

                //save files inside public/assets folder
		        $request->file->move('assets',$filename);
                //save the data inside database    
		        $data->file=$filename;


		        $data->full_name=$request->full_name;
		        $data->address=$request->address;
                $data->account_no=$request->account_no;

		        $data->save();
		        //return redirect()->back();
                return redirect()->route('dashboard/showdocument');
   }

   public function show()
   {
   	//$data=document::all();
    $data=document::latest()->get();
   	return view('showdocument',compact('data'));
   }


      public function download(Request $request,$file)
   {
        return response()->download(public_path('assets/'.$file));
   }

   public function view($id)
   {
   	$data=document::find($id);
   	return view('viewdoc',compact('data'));
   }

   public function edit($id)
   {
        $file = Document::find($id);
        return view('editdoc',compact('file'));

   }

   public function update(Request $request, $id)
   {
        $file=Document::find($id);
        
        $file_name = $file->file;
        $file_path = public_path('assets/' .$file_name);

        if($request ->hasFile('file')){
            
            unlink($file_path);
            $f = $request->file('file');
            $file_ext= $f->getClientOriginalExtension();
            $file_name = time().'.' . $file_ext;
            $file_path = public_path('assets/');
            $f->move($file_path,$file_name);
            $file->file=$file_name;
        }

        else{
            $file->file = $request->old_file;
        }


        $file->full_name=$request->full_name;
		$file->address=$request->address;
        $file->account_no=$request->account_no;

        $file->save();

        return redirect()->route('dashboard/showdocument');
   }


   //TO DELETE DOCUMENT function

    public function delete($id)
    {
        $file = Document::find($id);

        $file_name = $file->file;
        $file_path = public_path('assets/' .$file_name);
        unlink($file_path);

        $file->delete();

       return redirect()->route('dashboard/showdocument')
       ->with('success','Document deleted successfully');
    }

}
