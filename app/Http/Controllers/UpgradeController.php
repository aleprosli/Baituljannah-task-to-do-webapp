<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpgradeController extends Controller
{
    public function upgrade()
    {
        return view('premium_upgrade');
    }
}
