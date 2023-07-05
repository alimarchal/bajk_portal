<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticeBoardRequest;
use App\Http\Requests\UpdateNoticeBoardRequest;
use App\Models\NoticeBoard;
use Illuminate\Support\Facades\Auth;

class NoticeBoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:Create Notice Board')->only('create');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = NoticeBoard::orderBy('created_at', 'desc')->paginate(3);
        return view('noticeboard.index', compact('notices'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticeboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeBoardRequest $request)
    {
        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('', 'public');
            $request->merge(['document' => $path]);
        }

        $request->merge(['user_id' => Auth::user()->id]);

        NoticeBoard::create($request->all());
        // Redirect or perform any additional actions
        return to_route('noticeBoard.index')->with('status', 'File has been uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(NoticeBoard $noticeBoard)
    {
        return view('noticeboard.show',compact('noticeBoard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NoticeBoard $noticeBoard)
    {
        return view('noticeboard.edit', compact('noticeBoard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeBoardRequest $request, NoticeBoard $noticeBoard)
    {
        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('', 'public');
            $request->merge(['document' => $path]);
        }

        $request->merge(['user_id' => Auth::user()->id]);

        $noticeBoard->update($request->all());
        // Redirect or perform any additional actions
        return to_route('noticeBoard.index')->with('status', 'Notice has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NoticeBoard $noticeBoard)
    {
        //
    }
}
