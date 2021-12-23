<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use PDF;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index',['member'=>$members]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        if($request->file('photo')){
            $image_name = $request->file('photo')->store('images','public');
            }

            $member = new member();
            $member->nim = $request->nim;
            $member->name = $request->name;
            $member->class = $request->class;
            $member->department = $request->department;
            $member->phone_number = $request->phone_number;
            $member->photo = $image_name;
            $member->save();
        
        //The id of the member is returned in the response so it can be used to update the member's record with the file's path later on
        return redirect()->route('members.index')->with('success', 'Add data success!');
            
    }
    //This method stores the form image using the id returned to the view by the store() method
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        return view('members.show',['member'=>$member]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('members.edit',['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $member->nim = $request->nim;
        $member->name = $request->name;
        $member->class = $request->class;
        $member->department = $request->department;
        $member->phone_number = $request->phone_number;
        if($member->photo && file_exists(storage_path('app/public/'. $member->photo)))
        {
        \Storage::delete('public/'.$member->photo);
        }
        $image_name = $request->file('photo')->store('images', 
        'public');
        $member->photo = $image_name;
        $member->save();
        return redirect()->route('members.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index');

    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $member = member::where('name', 'like', "%" . $keyword . "%")->paginate(5);
        return view('members.index', compact('member'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function report($id){
        $member = Member::find($id);
        $pdf = PDF::loadview('members.report',['member'=>$member]);
        return $pdf->stream();
    }
}
