<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        return view('users.show', $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (Auth::id() === $user->id) {
            $user->delete();
            
            return redirect('/');
        }
        
        
        return redirect('/');
    }
}
