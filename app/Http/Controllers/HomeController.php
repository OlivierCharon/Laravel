<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Support\Facades\Auth;
    
    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
        
        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            return view('home');
        }
        
        public function welcome()
        {
            
            if (Auth::user()) {
                $right = Auth::user()->right;
                return view('welcome', compact('right'));
            } else {
                return view('welcome');
            }
        }
    }
