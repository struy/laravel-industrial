<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class AjaxImageController extends Controller
{
    //
    public function index()
    {
        $allowed = array('png', 'jpg', 'gif');
        $rules = [
            'file' => 'required|image|mimes:jpeg,jpg,png,gif'
        ];
        $data = Input::all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return '{"status":"Invalid File type"}';
        }
        if (Input::hasFile('file')) {
            $extension = Input::file('file')->getClientOriginalExtension();
            if (!in_array(strtolower($extension), $allowed)) {
                return '{"status":"Invalid File type"}';
            } else {
                $filename = uniqid() . '_attachment.' . $extension;
                if (Input::file('file')->move('source/', $filename)) {
                    echo url('source/' . $filename);
                    exit;
                }
            }
        } else {
            return '{"status":"Invalid File type"}';
        }



    }
}
