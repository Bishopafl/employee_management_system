<?php 

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Leave::latest()->get();
        return view('admin.leave.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $leaves = Leave::latest()->where('user_id', auth()->user()->id)->get();
        return view('admin.leave.create', compact('leaves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'from'        => 'required',
            'to'          => 'required',
            'description' => 'required',
            'type'        => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id; // assign user_id to the data
        $data['message'] = Leave::MESSAGE_PENDING;
        $data['status']  = Leave::PENDING;
        Leave::create($data);
        return redirect()->back()->with('message', 'Leave Request Submitted');
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
        $leave = Leave::findOrFail($id);
        return view('admin.leave.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'from'        => 'required',
            'to'          => 'required',
            'description' => 'required',
            'type'        => 'required',
        ]);
        $request_data = $request->all();
        $leave_data   = Leave::findOrFail($id);

        $request_data['user_id'] = auth()->user()->id;
        $leave_data['message']   = Leave::MESSAGE_PENDING;
        $leave_data['status']    = Leave::PENDING;

        $leave_data->update($request_data);
        return redirect()->route('leaves.create')->with('message', 'Leave Request Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Leave::findOrFail($id)->delete();
        return redirect()->route('leaves.create')->with('message', 'Leave Request Deleted');
    }

    public function acceptReject(Request $request, $id) 
    {
        $status = $request->status;
        $message = $request->message;

        $leave = Leave::findOrFail($id);
        $leave->update([
            'status'      => $status,
            'message'     => $message,
        ]);
        return redirect()->route('leaves.index')->with('message', 'Leave Request Updated');
    }
}
