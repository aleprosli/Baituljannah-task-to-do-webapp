<?php

namespace App\Http\Controllers\API;

use App\Models\Todolist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodolistController extends Controller
{
    public function index(Request $request)
    {
        // $response = $client->request('GET', '/api/user?api_token='.$token);

        $todolists = Todolist::all();
        
        return response()->json([
            'success' => true,
            'message' => 'Successfully display todolist',
            'data' => $todolists
        ]);
        
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        //store to DB - Mass assignment
        $todolist = Todolist::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        //return success

        return response()->json([
            'success' => true,
            'message' => 'Successfully create new todolist',
            'data' => $todolist
        ]);
    }

    public function update(Request $request,Todolist $todolist)
    {
        //validation
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
        ]);

        $todolist -> update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Successfully update todolist'
        ]);
    }

    public function delete(Todolist $todolist)
    {
        $todolist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfuly deleted todolist'
        ]);
    }
}
