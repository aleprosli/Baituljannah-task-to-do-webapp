<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    public function index(Todolist $todolist)
    {
        $user = auth()->user();
        $all = $user->todolists->first()->audits;
        
        return view('audit.index',compact('all'));
    }
}
