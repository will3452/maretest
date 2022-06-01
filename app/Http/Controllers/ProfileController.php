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
        $user = User::findOrFail(Auth::User()->id);

        return view('profile', [
            'user' => $user,
        ]);
    }
    public function store(Request $request)
    {


        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg:max:5048'
        ]);

        $image = $request->image->store('public');

        $isProfileIsExisting = Profile::where('user_id', auth()->id())->exists();

        if ($isProfileIsExisting) {
            auth()->user()->profile()->update([
                'image' => $image,
            ]);

            return back();
        }

        auth()->user()->profile()->create([
            'image' => $image,
        ]);

        return back();
    }
}
