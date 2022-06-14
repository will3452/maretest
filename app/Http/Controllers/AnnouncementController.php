<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('announcement');
    }
    public function store(Request $request)
    {
       $data = $request->validate([
            'date' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        Announcement::create([
            'user_id' => auth()->id(), 
            'description' => $data['description'], 
            'date' => $data['date'], 
            'where' => $data['location']
        ]);
        return back()->withSuccess('Success');
      
      
    
    }
}
