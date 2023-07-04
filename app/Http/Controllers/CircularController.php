<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCircularRequest;
use App\Http\Requests\UpdateCircularRequest;
use App\Models\Circular;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CircularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('circular.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('circular.create');
    }

    public function divisionId(Request $request, Division $division)
    {
        return view('circular.division', compact('division'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCircularRequest $request)
    {
        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('', 'public');
            $request->merge(['document' => $path]);
        }

        $request->merge(['user_id' => Auth::user()->id]);

        Circular::create($request->all());
        // Redirect or perform any additional actions
        return to_route('circular.index')->with('status', 'Instruction circular uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Circular $circular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circular $circular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCircularRequest $request, Circular $circular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circular $circular)
    {
        //
    }
}
