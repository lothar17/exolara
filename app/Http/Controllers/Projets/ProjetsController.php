<?php

namespace App\Http\Controllers\Projets;

use App\Models\Projets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projets::latest()->get();
        return view('projets.index', compact('projets'));
    }

    public function detail($id)
    {
        
        $projet = Projets::where("id", $id)->first(); //où la valeur = la valeur - find marche aussi
        
        if (!$projet)
        {
            return redirect()->route("projets.index")->with([
                "warning" => "Ce projet n'existe pas.",
            ]);
        }
        else
        {
            return view("projets.detail", compact('projet'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $validator = Validator::make($request->all(), [
            "name" => ['required', 'string', 'min:3', 'max:255', 'unique:projets'],
            "description" => ['required', 'string', 'min:10', "max:255"],
        ], [
            "name.required" => "Le nom est obligatoire.",
            "name.string" => "Entre une chaîne de caractère valide.",
            "name.unique" => "Entre quelque chose qui n'existe pas déjà.",
            "name.max" => "Trop long.",
            "name.min" => "Trop court. Minimum 3.",

            "description.required" => "La description est obligatoire.",
            "description.string" => "Entre une chaîne de caractère valide.",
            "description.max" => "Trop long.",
            "description.min" => "Trop court. Minimum 10 caractères.",
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        Projets::create([
            "name" => $request->name,
            "description" => $request->description,
        ]);


        return redirect()->route("projets.index")->with([
            "success" => "Votre projet est créé, gg.",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}