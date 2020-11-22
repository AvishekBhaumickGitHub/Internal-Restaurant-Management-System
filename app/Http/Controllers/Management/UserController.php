<?php

namespace App\Http\Controllers\Management;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Rules\MatchOldPassword;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::all();
        return view('management.user')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('management.createUser');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        $request->session()->flash('status', $request->name. ' is created successfully');
        return redirect('/management/user');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
	  
        return view('management.editUser')->with('users', $user);
		 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$user=user::find($id);
		$request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
           'password'=> ['required','min:6',new MatchOldPassword($user,0)],
            'role' => 'required'
			]);
        
		$user->name = $request->name;
        $user->email = $request->email;
        
        $user->role = $request->role;
        $user->save();
        $request->session()->flash('status', $request->name. ' is saved successfully');
        return redirect('/management/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::destroy($id);
        Session()->flash('status', 'The User is deleted successfully');
        return redirect('/management/user');
    }
	public function editPassword($id)
    {
	  $user = User::find($id);
        return view('management.changePassword')->with('user',$user);
		 
    }
	public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
       $request->validate([
           'oldpass' => ['required','min:6',new MatchOldPassword($user,1)],
           'newpass' => 'required|min:6|different:oldpass',
           'cpass'   =>  'required|min:6|same:newpass'
       ],[
           'newpass.different'  =>  'Old and new Password should be different',
           'cpass.same'         =>   'Please confirm your password correctly'
       ]);
       $user->password=Hash::make($request->newpass);
       $user->save();
        $request->session()->flash('status', 'Password updated successfully');
      
        return redirect('/management/user');
    }
}