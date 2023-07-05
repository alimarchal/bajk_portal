<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Models\Download;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('permission:Create Downloads')->only('create');
        $this->middleware('permission:delete')->only('destroy');
    }
    public function index()
    {
        $downloads = Download::where('category_id', 9)->get();
        $categoryId = 9;
        return view('download.category', compact('downloads','categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('download.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDownloadRequest $request)
    {
        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('', 'public');
            $request->merge(['document' => $path]);
        }

        $request->merge(['user_id' => Auth::user()->id]);

        Download::create($request->all());
        // Redirect or perform any additional actions
        return to_route('download.index')->with('status', 'File has been uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDownloadRequest $request, Download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $download)
    {
        // Retrieve the file path
        $filePath = $download->document;

        // Delete the file from storage
        if (!empty($filePath)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($filePath);
        }

        // Delete the Download model
        $download->delete();

        // Redirect or perform any additional actions
        return redirect()->route('download.index')->with('status', 'File has been deleted successfully!');
    }
}
