<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('profile', [
            'user' => $user,
        ]);
    }
    public function store(Request $request){


        $request->validate([

            'image' => 'required|mimes:jpg,png,jpeg:max:5048'

        ]);

        $newimagename = time() . '-' . $request->image->getClientOriginalName();

        $checkimageexist = Profile::where('user_id', auth()->id())->first();

        $oldimage = $checkimageexist->image;

        if(!$oldimage==null){

           
            $image_path = public_path("images/{$oldimage}");

            if (file_exists($image_path)) {

                unlink($image_path);

                $request->image->move(public_path('images'), $newimagename);

                Profile::where('user_id', auth()->id())->first()->update(['image'=>$newimagename]);

               return back(); 

            }



        }
        else{

            $request->image->move(public_path('images'), $newimagename);
    
            Profile::where('user_id', auth()->id())->first()->update(['image'=>$newimagename]);

           return back(); 
        }

      

      
    }
}
