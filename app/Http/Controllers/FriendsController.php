<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Auth;
use App\Friend;
use App\User;
use DB;



class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $friends = Friend::where('user', 'LIKE', "%$keyword%")
                ->orWhere('friend', 'LIKE', "%$keyword%")
                ->orWhere('state', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $friends = Friend::latest()->paginate($perPage);
        }

        return view('friends.index', compact('friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('friends.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Friend::create($requestData);

        return redirect('friends')->with('flash_message', 'friend added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $friend = Friend::findOrFail($id);

        return view('friends.show', compact('friend'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $friend = Friend::findOrFail($id);

        return view('friends.edit', compact('friend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $friend = Friend::findOrFail($id);
        $friend->update($requestData);

        return redirect('friends')->with('flash_message', 'friend updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Friend::destroy($id);

        return redirect('friends')->with('flash_message', 'friend deleted!');
    }
    public function relation($id){
        
        Friend::create([
            'user' => auth()->id(),
            'friend' => $id ,
            'state' =>'No Aceptado',
        ]);
    return redirect('all_users');
    }
    public function request(){
       
        $friends=Friend::all()->where('friend',auth()->id());
        $users=User::all();
        $array = array();
        foreach($friends as $friend){
            foreach($users as $user){
                if($friend['user']==$user['id']){
                    array_push($array,$user);
                }
            }
        }
            
        return view('request',compact('users','array'));
    }
    public function to_accept($id){
       $relation =Friend::where('user',$id)->where('friend',auth()->id());
      
        $relation->state = 'Aceptado';
        // Guardamos en base de datos
        $relation->save();
       
    
    
     

    }
}
