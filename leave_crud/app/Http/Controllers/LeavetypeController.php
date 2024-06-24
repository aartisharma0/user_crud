<?php

namespace App\Http\Controllers;

use App\Models\Leavetype;
use Illuminate\Http\Request;

class LeavetypeController extends Controller
{
    
    public function index()
    {
        
        $leaves = Leavetype::withTrashed()->get();
        $data = compact('leaves');
        return view('manageleavetype')->with(($data));
    }

    
    public function create()
    {
        $title = "Add Leave Type";
        $button = "Add";
        $url = route('type.store');
        $method = "post";
        $data = compact('url', 'title','button','method');
        return view('leaveType')->with($data);
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'type'=> 'required',
            
        ]);
        $leaves = new Leavetype();
        $leaves->type = $request['type'];
        $leaves->save();

        return redirect(route('type.index'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $leaves = Leavetype::find($id);

        if (is_null($leaves)) {
            // not found
            return redirect(route('type.index'));
        } else {
            $title = "Update Leave Type";
            $button = "Update";
            $method ="put";
            $url = route('type.update',$leaves->id);
            $data = compact('url','leaves', 'title','button','method');

            return view('leaveType')->with($data);
        }
    }

    
    public function update(Request $request, $id)
    {
        $leaves = Leavetype::find($id);
        $leaves->type = $request['type'];
        $leaves->save();

        return redirect(route('type.index'));
    }

    
    public function destroy($id)
    {
        $leaves = Leavetype::find($id);
        if (!is_null($leaves)) {
            $leaves->delete();
        }   
        return redirect(route('type.index'));
    }

    
    
    public function permanentdel($id)
    {
        $leaves = Leavetype::withTrashed()->find($id);
        if (!is_null($leaves)) {
            $leaves->forceDelete();
        }   
        return redirect(route('type.index'));
    }

    // public function onlytrash()
    // {
    //     $leaves = Leavetype::onlyTrashed()->get();
    //     $data = compact('leaves');
    //     return view('LeaveType')->with(($data));
    // }

    public function restore( $id)
    {
        // dd('sas');
        $leaves = Leavetype::withTrashed()->find($id);
        if (!is_null($leaves)) {
            $leaves->restore();
        }   
        return redirect(route('type.index'));
    }
}
