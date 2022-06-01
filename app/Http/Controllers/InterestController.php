<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index()
    {
        return view('interest.index');
    }

    public function create()
    {
        return view('interest.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Interest::create(['user_id' => auth()->id(), 'name' => $data['name']]);
        return back()->withSuccess('Interest has been added!');
    }
}
