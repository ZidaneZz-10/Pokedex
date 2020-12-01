<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $pokemons = Pokemon::all();
        return view('welcome',compact('types','pokemons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        return view('createPokemon', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateForm=$request->validate([
            "nom"=>"string|required",
            "type_id"=>"required",
            "image"=>"required",
            "niveau"=>"integer|required|min:1|max:100",
        ]);

        $newPokemon = new Pokemon;
        $newPokemon->nom = $request->nom;
        $newPokemon->type_id = $request->type_id;
        $newPokemon->image = $request->file('image')->hashName();
        $newPokemon->niveau = $request->niveau;
        $newPokemon->save();
        $request->file('image')->storePublicly('images', 'public');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $pokemon=Pokemon::find($id);
       return view('show',compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pokemon=Pokemon::find($id);
        $types=Type::all();
        return view('editPokemon',compact('pokemon','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $validateForm=$request->validate([
            "nom"=>"string|required",
            "type_id"=>"required",
            "image"=>"required",
            "niveau"=>"integer|required|min:1|max:100",
        ]);
        
        $newPokemon=Pokemon::find($id);
        $newPokemon->nom = $request->nom;
        $newPokemon->type_id = $request->type_id;
        $newPokemon->image = $request->file('image')->hashName();
        $newPokemon->niveau = $request->niveau;
        $newPokemon->save();
        $request->file('image')->storePublicly('images', 'public');
        Storage::disk('public')->delete('images/' . $newPokemon->photo);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pokemon=Pokemon::find($id);
        Storage::disk('public')->delete('images/' . $pokemon->image);
        $pokemon->delete();
        return redirect('/');
    }
}
