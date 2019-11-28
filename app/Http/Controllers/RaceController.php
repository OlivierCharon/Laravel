<?php
    
    namespace App\Http\Controllers;
    
    use App\Race;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Validator;
    
    class RaceController extends Controller
    {
//        public function __construct()
//        {
//            $this->middleware('auth');
//        }
        
        public function showRaces()
        {
            $races = Race::All();
            $right = Auth::user()->right;
            return view('races.show', compact('races', compact('right')));
            
        }
        
        public function createRaces()
        {
            if (Auth::user()->right->name == 'Admin') {
                $races = Race::All();
                return view('races.create', compact('races'));
            } else {
                return view('welcome');
            }
        }
        
        public function updateRaces($id)
        {
            if (Auth::user()->right->name == 'Admin') {
                $race = Race::find($id);
                $races = Race::All();
                return view('races.update', compact('races', 'race'));
            } else {
                return view('welcome');
            }
        }
        
        public function deleteRaces($id)
        {
            if (Auth::user()->right->name == 'Admin') {
                $race = Race::find($id);
                $race->delete();
                return redirect('/races/show')->with('warning', $race->name . 'Successfully deleted!');
            } else {
                return view('welcome');
            }
        }
        
        public function storeRaces(Request $request)
        {
            if (Auth::user()->right->name == 'Admin') {
                $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:races|max:100',
                    'class' => 'required|max:100',
                    'life_duration' => 'required|numeric|min:1|max:30',
                ]);
                
                if ($validator->fails()) {
                    return redirect('/races/create')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    
                    $race = new Race([
                        'name' => $request->name,
                        'class' => $request->class,
                        'life_duration' => $request->life_duration
                    ]);
                    $race->save();
                    return redirect('/races/show')->with('success', 'Race created!');
                }
            } else {
                return view('welcome');
            }
        }
        
        public function updateStoreRaces(Request $request, $id)
        {
            if (Auth::user()->right->name == 'Admin') {
                $race = Race::find($id);
                $validator = Validator::make($request->all(), [
                    'name' => 'required|max:100',
                    'class' => 'required|max:255',
                    'life_duration' => 'required|numeric|min:1|max:30'
                ]);
                if ($validator->fails()) {
                    return redirect("/races/edit/$id")
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    $race->name = $request->name;
                    $race->class = $request->class;
                    $race->life_duration = $request->life_duration;
                    $race->save();
                    return redirect('/races/show')->with('success', 'Race information updated!');
                }
            } else {
                return view('welcome');
            }
        }
    }
