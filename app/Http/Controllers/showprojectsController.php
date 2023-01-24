<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;


class showprojectsController extends Controller
{
    public function add(Request $request)
    {
        return view('projects.addproject', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
    public function show(Request $request)
    {
       $products = Project::paginate(15);
     
        //die("iohdfuhseduih");
       return view('dashboard', [
            'request' => $request,
            'user' => $request->user(),
            'data' => $products,
        ]);



       
    }

    public function singleproject($id)
    {
        $products = Project::where('id', $id)->get()->toArray();
     
//print_r($products); die;
       return view('projects.singleproject', ['data' => $products]);



       
    }
    public function addproduct2(Request $request)
    {
    // $imageName = time().'.'.$request->file->extension();

    // $name = $request->file->getClientOriginalName();

    // $request->image->move(public_path('xmlfile'), $imageName);

    // $xmlDataString = file_get_contents(public_path($name));
    //     $xmlObject = simplexml_load_string($xmlDataString);
                   
    //     $json = json_encode($xmlObject);
    //     $phpDataArray = json_decode($json, true); 
   
    //     // echo "<pre>";
    //     // print_r($phpDataArray);
    //     dd($phpDataArray);

    // Public Folder
    // $request->image->move(public_path('images'), $imageName);

    // //Store in Storage Folder
    // $request->image->storeAs('images', $imageName);

    // // Store in S3
    // $request->image->storeAs('images', $imageName, 's3');

    //Store IMage in DB 


    // return back()->with('success', 'Image uploaded Successfully!')
    // ->with('image', $imageName);
    }
}
