<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navLinks = config('db.navLinks');
        $comics = Comic::all();
        return view('admin.welcome', compact('navLinks', 'comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $navLinks = config('db.navLinks');
        return view('admin.create', compact('navLinks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newComic = new Comic();
        $newComic->fill($data);
        $newComic->save();

        return redirect()->route('showComic', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $navLinks = config('db.navLinks');
        $singleComic = Comic::findOrFail($id);
        return view('admin.show', compact('singleComic', 'navLinks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $navLinks = config('db.navLinks');
        $newComic = Comic::findOrFail($id);

        return view('admin.edit', compact('newComic', 'navLinks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Int $id)
    {
        $updateComic = Comic::findOrFail($id);
        $updateComic->update($request->all());

        return redirect()->route('HomepageAdmin')->with('updated', 'Fumetto aggiornato con successo!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteComic = Comic::findOrFail($id);
        $deleteComic->delete();

        return redirect()->route('HomepageAdmin')->with('deleted', 'Fumetto eliminato con successo!!');
    }
}
