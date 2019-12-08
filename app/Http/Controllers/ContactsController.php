<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use App\Auth;
class ContactsController extends Controller
{
    public function get()
    {
        $contacts = array();
        $users = User::all();
        foreach($users as $user){
            if($user['id']!=auth()->id()){
                array_push($contacts,$user);
            }
        }
        return response()->json($contacts);
    }
    public function getMessagesFor($id){
        $messages = Message::where('from',$id)->orwhere('to',$id)->get();
        return response()->json($messages);
    }
    public function send(Request $request){
        $message=Message::create([
          'from'=>auth()->id(),
          'to'=>$request->contact_id,
          'text'=>$request->text

        ]);
        return response()->json($message);
    }


}
