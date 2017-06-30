<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* */
    public function index()
    {
        $artists = Artist::all();
        return view('admin.artist.index', ['artists'=>$artists]);
    }

    public function search(Request $request)
    {
        $query = $request->search;
        $artists = Artist::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('pages.artist', ['artists'=>$artists]);
    }
    public function admin_search(Request $request)
    {
        $query = $request->search;
        $artists = Artist::where('name', 'LIKE', '%' . $query . '%')->paginate(10);
        return view('admin.artist.index', ['artists'=>$artists]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artist = new Artist;
        $artist->name = $request->name;
        // Check of de afbeelding leeg is
        if (empty($request->image)) {
            // Voegt een placeholder image toe
           $artist->image = "http://localhost:8000/images/profile.png";
        } else {
            // Voegt de image toe uit de form
            $artist->image = $request->image; 
        }
        $artist->biography = $request->biography;
        $artist->save();
        
        return redirect('/admin/artists'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id);
        return view('admin.artist.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);
        return view('admin.artist.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist->name = $request->name;
        $artist->image = $request->image;
        $artist->biography = $request->biography;
        $artist->save();
        return redirect()->route('artists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::findOrFail($id);
        $artist->delete();
        return redirect()->route('artists.index');
    }
}
