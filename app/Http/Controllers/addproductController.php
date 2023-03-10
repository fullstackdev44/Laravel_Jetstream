<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;


class addproductController extends Controller
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
        //die("iohdfuhseduih");
       return view('projects.showprojects', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
    public function added(Request $request)
    {
       $validated = $request->validate([
            'name' => 'required',
            'file' => 'required',
        ]);
        $emps = new Project;

        if ($request->file->extension() != "xml") {
            return Redirect::back()->withErrors(['file' => 'Please upload xml file']);
        }

        $imageName = time().'.'.$request->file->extension();

        // $name = $request->file->getClientOriginalName();

        $request->file->move(public_path('xmlfile'), $imageName);

        $emps->name = $request->input('name');
        $emps->user_id = Auth::user()->id;
        $emps->file_name = $imageName;
        $emps->status = 0;
        
        $emps->save();
        return redirect()->back()->with('success', 'Prodject added successfully');   
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
