<?php

namespace App\Http\Controllers\survey;

use App\Models\Survey;
use App\Models\Projets;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::latest()->get();
        return view('survey.index', compact('surveys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $projet = Projets::where("id", $id)->first();
        
        if (!$projet)
        {
            return redirect()->route("projets.index")->with([
                "warning" => "Ce projet n'existe pas.",
            ]);
        }
        else
        {
            return view('survey.create', compact('projet'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projet = Projets::where("id", $request->projet_id)->first();
        
        if (!$projet)
        {
            return redirect()->route("projets.index")->with([
                "warning" => "Ce projet n'existe pas.",
            ]);
        }
        else
        {
            $validator = Validator::make($request->all(), [
                "date_debut" => ['required'],
                "date_fin" => ['required'],
            ], [
                "date_debut.required" => "La date de début est obligatoire.",
                "date_debut.required" => "La date de fin est obligatoire.",
            ]);

            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if ($request->date_debut < now()) //ne marche pas encore
            {
                $status = "in_progress";
            };

            Survey::create([
                "date_debut" => $request->date_debut,
                "date_fin" => $request->date_fin,
                "projet_id" => $request->projet_id,
                "status" => $status,

            ]);

            // id     date_debut     date_fin     status     resultat     projet_id     created_at     updated_at     

            return redirect()->route("survey.index")->with([
                "success" => "Votre sondage est créé, gg.",
            ]);
        }
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
