<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = Auth::user()->todolists;
        return view('todolist.index',compact('todolists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        //store using model 
        $todolist = new Todolist();
        $todolist->user_id = auth()->user()->id;
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        $todolist->date = $request->date;
        $todolist->save();

        return redirect()->route('todolist:index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'New task has been add!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('todolist.edit',compact('todolist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);
        
        $todolist->title = $request->title;
        $todolist->description = $request->description;
        $todolist->date = $request->date;
        $todolist->save();

        return redirect()->route('todolist:index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Your task has been updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();

        return redirect()->route('todolist:index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'Task has been delete!'
        ]);
    }
}
