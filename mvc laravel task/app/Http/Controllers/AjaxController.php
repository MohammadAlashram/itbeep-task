<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect,Response;
use App\User;

class AjaxController extends Controller
{
    public function index(){
        return view('dummydata');
    }

    public function dummydata($id = 0){
        // get records from database

        if($id==0){
            $arr['data'] = User::orderBy('id', 'asc')->get();
        }else{
            $arr['data'] = User::where('id', $id)->first();
        }
        echo json_encode($arr);
        exit;
    }
}
