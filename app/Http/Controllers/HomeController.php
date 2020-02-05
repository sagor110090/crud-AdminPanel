<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home');
    }

    public function crudIndex()
    {
        return view('crud');
    }

    public function crudMaker(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'modelName'=>'required',
            // 'fields'=>'required',
        ]);

        $fields = '';
        foreach ($request->fields as $key => $value) {
           $fields .= $value;
        } 

        // return $fields; 
        
        // $fildName = $request->totalString;  
        // $fildName = "title#string; content#text;";  

          

        Artisan::call("crud:generate '".$request->modelName."' --fields='".$fields."'--view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html");

        return $request->modelName.'make successfully';
            
    }
}
