<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use DB;

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

    // public function crudMaker(Request $request)
    // {   
    //     // dd($request->all());
    //     $request->validate([
    //         'modelName'=>'required',
    //         // 'fields'=>'required',
    //     ]);

    //     $fields = '';
    //     foreach ($request->fields as $key => $value) {
    //        $fields .= $value;
    //     } 

    //     // return $fields; 
        
    //     // $fildName = $request->totalString;  
    //     // $fildName = "title#string; content#text;";  

          

    //     Artisan::call("crud:generate '".$request->modelName."' --fields='".$fields."'--view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html");

    //     return $request->modelName.'make successfully';
            
    // }
    public function crudMaker(Request $request)
    {   
        // dd($request->all());
          
   $myFile = "data.json";
   $arr_data =[]; // create empty array

  try
  {
    
       foreach ($request->name as $i => $value) {
        $formdata[$i] =[
            'name'=> $request->name[$i],
            'type'=> $request->type[$i],
        ];
       }
       $final=[
           'fields'=>$formdata
       ];
    //    dd($final['name']);

	   //Get data from existing json file
	   $jsondata = file_get_contents($myFile);
    //    dd($final);
       $final = json_encode($final);
    //    DB::table('crud')->insert([
    //         'content' => $final
    //    ]);
    //    dd($final);

	   // converts json data into array
	   $arr_data = json_decode($jsondata, true);
	   // Push user data to array
    //    array_push($arr_data,$final);

       //Convert updated array to JSON
	   $jsondata = json_encode($final, JSON_PRETTY_PRINT);
	   $res = DB::table('crud')->first();
//    dd($res);
	   //write json data into data.json file
	   if(file_put_contents($myFile, $res->content)) {
	        echo 'Data successfully saved';
	    }
	   else 
	        echo "error";

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }
   
   Artisan::call('crud:generate Posts --fields_from_file="data.json" --view-path=admin --controller-namespace=Admin --route-group=admin --form-helper=html');

        return $request->modelName.'make successfully';
            
    }
}
