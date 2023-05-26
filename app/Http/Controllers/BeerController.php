<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $beers = beer::orderBy('marca')->get();

        return view ('beers.index', compact ('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {
        //
        return view('beers.show', compact('beer'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beer $beer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beer $beer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
        //
    }






}
