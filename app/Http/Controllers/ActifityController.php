<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actifity;

class ActifityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actifitys = Actifity::all();
        return view('actifity.index',['actifity'=>$actifitys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actifity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add data
        Actifity::create($request->all());

        // if true, redirect to index
        return redirect()->route('actifity.index')->with('success', 'Add data success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actifity = Actifity::find($id);
        return view('actifity.show',['actifity'=>$actifity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actifity = Actifity::find($id);
        return view('actifity.edit',['actifity'=>$actifity]);
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
        $actifity = Actifity::find($id);
        $actifity->actifity_name = $request->actifity_name;
        $actifity->place = $request->place;
        $actifity->date = $request->date;
        $actifity->save();
        return redirect()->route('actifity.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actifity = Actifity::find($id);
        $actifity->delete();
        return redirect()->route('actifity.index');
    }
}
