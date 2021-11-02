<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpgradeController extends Controller
{
    public function upgrade()
    {
        return view('premium_upgrade');
    }

    public function upgradeIsPremium()
    {
        // $user_upgrade = Auth::user()->pluck('is_premium');

        auth()->user()->update([
            'is_premium' => 1,
        ]);

        return redirect()->route('todolist:index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Your account has been upgrade. Now you can use create unlimited task'
        ]);
    }
}
