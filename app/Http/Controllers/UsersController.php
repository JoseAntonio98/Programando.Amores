<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
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
            $users = user::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('profile_image', 'LIKE', "%$keyword%")
                ->orWhere('role', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = user::latest()->paginate($perPage);
        }

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
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
        
        $requestData = request()->except('_token');
        if ($request->hasFile('profile_image')) {
            $requestData['profile_image'] = $request->file('profile_image')->store('uploads','public');
        }
        $a=0;
        if($request['role']==NULL){
            $request['role']='Normal';
            $a=1;
        }
        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'language' => $request['language'],
            'profile_image' =>$requestData['profile_image'],
            'role' => $request['role']
        ]);
       
        if($a==1){
        return redirect('login')->with('flash_message', 'user added!');

        
        }else{
        return redirect('users')->with('flash_message', 'user added!');
        }
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
        $user = user::find($id);

        return view('users.show', compact('user'));
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
        $user = user::findOrFail($id);

        return view('users.edit', compact('user'));
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
                if ($request->hasFile('profile_image')) {
            $requestData['profile_image'] = $request->file('profile_image')
                ->store('uploads', 'public');
        }

        $user = user::findOrFail($id);
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'language' => $request['language'],
            'profile_image' => $request['profile_image'],
            'role' => 'Normal'
        ]);

        return redirect('users')->with('flash_message', 'user updated!');
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
        user::destroy($id);

        return redirect('users')->with('flash_message', 'user deleted!');
    }
    public function getallusers()
    {
        $hola=0;
        $contacts =  User::all();
       
        $avatars= User::all('profile_image');
        return view('all_users',compact('contacts','avatars','hola'));
    }
}
