<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {   
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $userCreate = new User();
        $userCreate->name = $request->name;
        $userCreate->email = $request->email;
        $userCreate->password = Hash::make($request->password);
        $userCreate->save();
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $userd = User::find($id);
        return view('users.edit', compact('id','user', 'userd'));
    }

    public function update(Request $request, $id)
    {
        $updateUser = User::find($id);
        $updateUser->name = $request->name;
        $updateUser->email = $request->email;
        $updateUser->password = Hash::make($request->password);
        $updateUser->update();
        return redirect()->to('/users');
    } 

    public function destroy(Request $request)
    {
        try{
            $deleteUser=User::find($request->id);
            $deleteUser->delete();
            return redirect('/users');
        } catch(Exception $e){
            abort(500);
        }
    }
}
