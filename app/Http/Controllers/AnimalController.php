<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AnimalController extends Controller
{
    //        public function __construct()
//        {
//            $this->middleware('auth');
//        }
    
    public function showAnimals()
    {
        $animals = Animal::All();
        $right = Auth::user()->right;
        return view('animals.show', compact('animals', compact('right')));
      
    }
    
    public function createAnimals()
    {
        if (Auth::user()->right->name == 'Admin') {
            $races = Race::All();
            return view('animals.create', compact('races'));
        } else {
            return view('welcome');
        }
    }
    
    public function updateAnimals($id)
    {
        if (Auth::user()->right->name == 'Admin') {
            $animal = Animal::find($id);
            $races = Race::All();
            return view('animals.update', compact('races', 'animal'));
        } else {
            return view('welcome');
        }
    }
    
    public function deleteAnimals($id)
    {
        if (Auth::user()->right->name == 'Admin') {
            $animal = Animal::find($id);
            $animal->delete();
            return redirect('/animals/show')->with('warning', $animal->name.' successfully deleted!');
        } else {
            return view('welcome');
        }
    }
    
    public function storeAnimals(Request $request)
    {
        if (Auth::user()->right->name == 'Admin') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:animals|max:100',
                'desc' => 'required|max:255',
                'sex' => 'required|max:1',
                'age' => 'required|numeric|min:1|max:30',
                'weight' => 'required|numeric|min:1|max:100',
                'size' => 'required|numeric|min:1|max:100',
                'race_id' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect('/animals/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
        
                $animal = new Animal([
                    'name' => $request->name,
                    'desc' => $request->desc,
                    'sex' => $request->sex,
                    'age' => $request->age,
                    'weight' => $request->weight,
                    'size' => $request->size,
                    'race_id' => $request->race_id
                ]);
                $animal->save();
                return redirect('/animals/show')->with('success', 'Animal created!');
            }
        } else {
            return view('welcome');
        }
      
    }
    
    public function updateStoreAnimals(Request $request, $id)
    {
        if (Auth::user()->right->name == 'Admin') {
            $animal = Animal::find($id);
    
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:animals|max:100',
                'desc' => 'required|max:255',
                'sex' => 'required|max:1',
                'age' => 'required|numeric|min:1|max:30',
                'weight' => 'required|numeric|min:1|max:100',
                'size' => 'required|numeric|min:1|max:100',
                'race_id' => 'required'
            ]);
    
            if ($validator->fails()) {
                return redirect("/animals/edit/$id")
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $animal->name = $request->name;
                $animal->desc = $request->desc;
                $animal->sex  = $request->sex;
                $animal->age  = $request->age;
                $animal->weight = $request->weight;
                $animal->size = $request->size;
                $animal->race_id = $request->race_id;
                $animal->save();
                return redirect('/animals/show')->with('success', 'Animal information updated!');
            }
        } else {
            return view('welcome');
        }
    }
}
