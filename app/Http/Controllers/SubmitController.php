<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmitController extends Controller
{
    public function store(Request $request)
    {
        return $request->all();
        // // dd(json_decode($request->getContent(), true));
        // $data = json_decode($request->all(), true);
        // foreach ($data['section-1'] as $i => $d) {
        //     echo JSON.stringify($d).'\n';
        // }
    }
}
