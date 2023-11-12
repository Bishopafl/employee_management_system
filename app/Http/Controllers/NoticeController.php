<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notices = Notice::latest()->get();
        return view('admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
            'name' => 'required',
        ]);
        Notice::create($request->all());
        return redirect()->route('notices.index')->with('message', 'Notice Created Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $notice = Notice::findOrFail($id);
        return view('admin.notice.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $notice = Notice::findOrFail($id);
        $notice->update($request->all());
        return redirect()->route('notices.index')->with('message', 'Notice Updated Successfully');
    }

    /**
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Notice::findOrFail($id)->delete();
        return redirect()->route('notices.index')->with('message', 'Notice Deleted Successfully');
    }
}
