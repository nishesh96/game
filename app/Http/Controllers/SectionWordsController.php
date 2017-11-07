<?php

namespace App\Http\Controllers;

use App\SectionWords;
use App\Words;
use Illuminate\Http\Request;

class SectionWordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function UniqueRandomNumbersWithinRange($min, $max, $quantity)
    {
        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
    function filterKeys($v)
    {
        return $v['Words'];
    }
    public function index()
    {
        $sectionList  = SectionWords::all();
        $randomIndices = $this->UniqueRandomNumbersWithinRange(0, count($sectionList) - 1, 2);
        $wordIds = [
            $sectionList[$randomIndices[0]]->Word1,
            $sectionList[$randomIndices[0]]->Word2,
            $sectionList[$randomIndices[0]]->Word3,
            $sectionList[$randomIndices[1]]->Word1,
            $sectionList[$randomIndices[1]]->Word2,
            $sectionList[$randomIndices[1]]->Word3,
        ];
        $words = Words::find($wordIds) -> toArray();
        shuffle($words);
        $result = array_map(array($this, "filterKeys"), $words);
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectionWords  $sectionWords
     * @return \Illuminate\Http\Response
     */
    public function show(SectionWords $sectionWords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectionWords  $sectionWords
     * @return \Illuminate\Http\Response
     */
    public function edit(SectionWords $sectionWords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectionWords  $sectionWords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SectionWords $sectionWords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectionWords  $sectionWords
     * @return \Illuminate\Http\Response
     */
    public function destroy(SectionWords $sectionWords)
    {
        //
    }
}
