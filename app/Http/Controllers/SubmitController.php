<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function newGame(Request $request)
    {
        return $request->get('data');
    }
}
