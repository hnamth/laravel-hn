<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['username'] = 'hnamth';
        $data ['last_login'] = date('Y-m-d H:i:s');
        $data ['list_pendidikan'] = ['SD AL-Azhar Syifa Budi Pekanbaru','SMPN 10 Pekanbaru','SMAN 1 Pekanbaru','D4 Teknik Informatika Politeknik Caltex Riau'];									    
        return view('home', $data );
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
