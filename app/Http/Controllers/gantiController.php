<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\helpers;

class gantiController extends Controller
{
    public function ganti()
    {
        $welcomeText = translate('Welcome', 'id');
        return view('welcome', compact('welcomeText'));
    }
}
