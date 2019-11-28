<?php

namespace App\Http\Controllers;

use App\User;
use App\Right;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::All();
        $right = Auth::user()->right;
        return view('users.show', compact('users', compact('right')));
        
    }
    
    public function createUsers()
    {
        if (Auth::user()->right->name == 'Admin') {
            $rights = Right::All();
            return view('users.create', compact('rights'));
        } else {
            return view('welcome');
        }
    }
    
    public function updateUsers($id)
    {
        if (Auth::user()->right->name == 'Admin') {
            $user = User::find($id);
            $rights = Right::All();
            return view('users.update', compact('rights', 'user'));
        } else {
            return view('welcome');
        }
    }
    
    public function deleteUsers($id)
    {
        if (Auth::user()->right->name == 'Admin') {
            $user = User::find($id);
            $user->delete();
            return redirect('/users/show')->with('warning', $user->name.' successfully deleted!');
        } else {
            return view('welcome');
        }
    }
    
    public function storeUsers(Request $request)
    {
        if (Auth::user()->right->name == 'Admin') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:users|max:100',
                'desc' => 'required|max:255',
                'sex' => 'required|max:1',
                'age' => 'required|numeric|min:1|max:30',
                'weight' => 'required|numeric|min:1|max:100',
                'size' => 'required|numeric|min:1|max:100',
                'right_id' => 'required'
            ]);
            
            if ($validator->fails()) {
                return redirect('/users/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                
                $user = new User([
                    'name' => $request->name,
                    'desc' => $request->desc,
                    'sex' => $request->sex,
                    'age' => $request->age,
                    'weight' => $request->weight,
                    'size' => $request->size,
                    'right_id' => $request->right_id
                ]);
                $user->save();
                return redirect('/users/show')->with('success', 'User created!');
            }
        } else {
            return view('welcome');
        }
        
    }
    
    public function updateStoreUsers(Request $request, $id)
    {
        if (Auth::user()->right->name == 'Admin') {
            $user = User::find($id);
            
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:users|max:100',
                'desc' => 'required|max:255',
                'sex' => 'required|max:1',
                'age' => 'required|numeric|min:1|max:30',
                'weight' => 'required|numeric|min:1|max:100',
                'size' => 'required|numeric|min:1|max:100',
                'right_id' => 'required'
            ]);
            
            if ($validator->fails()) {
                return redirect("/users/edit/$id")
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $user->name = $request->name;
                $user->desc = $request->desc;
                $user->sex  = $request->sex;
                $user->age  = $request->age;
                $user->weight = $request->weight;
                $user->size = $request->size;
                $user->right_id = $request->right_id;
                $user->save();
                return redirect('/users/show')->with('success', 'User information updated!');
            }
        } else {
            return view('welcome');
        }
    }
}
