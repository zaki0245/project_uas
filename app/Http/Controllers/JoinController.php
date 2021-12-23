<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Join;
use App\Models\Member;
use App\Models\Actifity;

class JoinController extends Controller
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
        $join = Join::with('actifity','member')->get();
        return view('join.index',['join'=>$join]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $member = Member::all();
        $actifity = Actifity::all();
        return view('join.create',['member'=>$member],['actifity'=>$actifity]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $join = new Join;

        $member = new Member;
        $member->id = $request->name_id;

        $actifity = new Actifity;
        $actifity->id = $request->actifity_id;

        $join->member()->associate($member);
        $join->actifity()->associate($actifity);

        $join->save();
        return redirect()->route('join.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $join = Join::find($id);
        return view('join.show',['join'=>$join]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $join = Join::find($id);
        $member = Member::all();
        $actifity = Actifity::all();
        return view('join.edit',['join'=>$join,'member'=>$member],['join'=>$join,'actifity'=>$actifity]);
        
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
        $join = Join::find($id);
        $member = new Member;
        $member->id = $request->name_id;

        $actifity = new Actifity;
        $actifity->id = $request->actifity_id;

        $join->member()->associate($member);
        $join->actifity()->associate($actifity);

        $join->save();
        return redirect()->route('join.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $join = Join::find($id);
        $join->delete();
        return redirect()->route('join.index');
    }

}