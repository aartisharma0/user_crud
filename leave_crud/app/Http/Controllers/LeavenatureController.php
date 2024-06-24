<?php

namespace App\Http\Controllers;

use App\Models\Leavenature;
use Illuminate\Http\Request;

class LeavenatureController extends Controller
{
    public function index()
    {
        // dd('dddd');
        $leaves = Leavenature::withTrashed()->get();
        $data = compact('leaves');
        return view('manageleavenature')->with(($data));
    }

    
    public function create()
    {
        $title = "Add Leave Nature";
        $button = "Add";
        $url = route('nature.store');
        $method = "post";
        $data = compact('url', 'title','button','method');
        return view('leaveNature')->with($data);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nature'=> 'required',
            'deduction'=> 'required',
            
        ]);
        $leaves = new Leavenature();
        $leaves->nature = $request['nature'];
        $leaves->deduction = $request['deduction'];
        $leaves->save();

        return redirect(route('nature.index'));
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $leaves = Leavenature::find($id);

        if (is_null($leaves)) {
            // not found
            return redirect(route('nature.index'));
        } else {
            $title = "Update Leave Nature";
            $button = "Update";
            $method ="put";
            // $url = route('nature.update') . "/" . $leaves;
            $url = route('nature.update',$leaves->id);
            $data = compact('url','leaves', 'title','button','method');

            return view('leaveNature')->with($data);
        }
    }

    
    public function update(Request $request, $id)
    {
        $leaves = Leavenature::find($id);
        $leaves->nature = $request['nature'];
        $leaves->deduction = $request['deduction'];
        $leaves->save();

        return redirect(route('nature.index'));
    }

    
    public function destroy($id)
    {
        $leaves = Leavenature::find($id);
        if (!is_null($leaves)) {
            $leaves->delete();
        }   
        return redirect(route('nature.index'));
    }

    public function permanentdel($id)
    {
        $leaves = Leavenature::withTrashed()->find($id);
        if (!is_null($leaves)) {
            $leaves->forceDelete();
        }   
        return redirect(route('nature.index'));
    }

    // public function onlytrash()
    // {
    //     $leaves = Leavenature::onlyTrashed()->get();
    //     $data = compact('leaves');
    //     return view('leaveNature')->with(($data));
    // }

    public function restore( $id)
    {
        $leaves = Leavenature::withTrashed()->find($id);
        if (!is_null($leaves)) {
            $leaves->restore();
        }   
        return redirect(route('nature.index'));
    }
}
