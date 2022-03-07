<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatsGroupes extends Controller
{

    public function get_all_messages($id_groupe){
        return \App\ChatsGroupes::where('id_groupe', '=', $id_groupe)->get()->makeHidden('id_groupe');
    }

    public function add_message()
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'id_groupe' => 'required|max:15',
            'id_user' => 'required|max:15',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        $save = \App\ChatsGroupes::create([
            'id_groupe' => request('id_groupe'),
            'id_user' => request('id_user'),
            'message' => request('message'),
            'envoyele' => Carbon::now()->toDateTimeString()
        ]);
        return $save->id_message;
    }

    public function remove_message($id_message)
    {
        $save = \App\ChatsGroupes::where('id_message','=', $id_message)->first()->delete();
        if($save){
            return "ok";
        }else{
            return "error";
        }
    }

}
