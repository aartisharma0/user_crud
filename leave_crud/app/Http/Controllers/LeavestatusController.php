<?php

namespace App\Http\Controllers;

use App\Models\Leavestatus;
use App\Models\Leavetype;
use Illuminate\Http\Request;

class LeavestatusController extends Controller
{
    
    public function index()
    { 
        $leaves = Leavestatus::withTrashed()->get();
        $data = compact('leaves');
        return view('manageleavestatus')->with(($data));
    }

    
    public function create()
    {
        $title = "Add Leave Status";
        $button = "Add";
        $url = route('status.store');
        $method = "post";
        $data = compact('url', 'title','button','method');
        return view('leaveStatus')->with($data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'status'=> 'required',            
        ]);
        $leaves = new Leavestatus();
        $leaves->status = $request['status'];
        $leaves->save();

        return redirect(route('status.index'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $leaves = Leavestatus::find($id);

        if (is_null($leaves)) {
            // not found
            return redirect(route('type.index'));
        } else {
            $title = "Update Leave Status";
            $button = "Update";
            $method ="put";
            $url = route('status.update',$leaves->id);
            $data = compact('url','leaves', 'title','button','method');

            return view('leaveStatus')->with($data);
        }
    }

    
    public function update(Request $request, $id)
    {
        $leaves = Leavestatus::find($id);
        $leaves->status = $request['status'];
        $leaves->save();

        return redirect(route('status.index'));
    }

    
    public function destroy($id)
    {
        $leaves = Leavestatus::find($id);
        if (!is_null($leaves)) {
            $leaves->delete();
        }   
        return redirect(route('status.index'));
    }
    
    
    public function permanentdel($id)
    {
        $leaves = Leavestatus::withTrashed()->find($id);
        if (!is_null($leaves)) {
            $leaves->forceDelete();
        }   
        return redirect(route('status.index'));
    }
    
    // public function onlytrash()
    // {
    //     $leaves = Leavestatus::onlyTrashed()->get();
    //     $data = compact('leaves');
    //     return view('LeaveStatus')->with(($data));
    // }

    public function restore( $id)
    {
        $leaves = Leavestatus::withTrashed()->find($id);
        if (!is_null($leaves)) {
            $leaves->restore();
        }   
        return redirect(route('status.index'));
    }
}
