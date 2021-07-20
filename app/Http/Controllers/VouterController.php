<?php

namespace App\Http\Controllers;

use App\Models\Vouter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class VouterController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function logout()
    {
        if (session('vouter'))
        {
            session()->flush();           
        }
        return view('welcome');
    }

    public function login(Request $request)
    {
        try{
       $vouter = Vouter::where('email', $request->email)->where('password', $request->password)->first();
        if ($vouter)
        {
            session(['vouter' => $vouter]);
            return redirect()->route("user.index");
        }
        else
        {
            return redirect()->route("login");
        }
    }
    catch(\Exeption $e){
        echo $e->getMessage();
    } 
    }
    
    public function create()
    {
        return view("register");
    }

    public function store(Request $request)
    {
        //je verifie ou je met en place mes regles
        // de validation pour filtrer les données         
        // envoyés par la vue en fonction  de mon besoin
        $validator = Validator::make($request->all(), [
            "prenom" => ["required", "string", "min:2", "max:255"],
            "nom" => ["required", "string", "min:2", "max:255"],
            "email" => ["required", "email", "unique:vouters"],
            "age" => ["required", "between:3,103"],
            "tel" => ["required", "regex:/^[0-9\S\-\+\(\)]{5,20}$/"],
        ],[
            "prenom.required" => "C'est obligatoire.",
            "prenom.string" => "Veuillez entrer une chaine de caractères.",
            "prenom.name.min" => "On veut au minimum 2 caractères.",
            "prenom.name.max" => "On veut au maximum 255 caractères.",

            "nom.required" => "C'est obligatoire.",
            "nom.string" => "Veuillez entrer une chaine de caractères.",
            "nom.name.min" => "minimum 2 caractères.",
            "nom.name.max" => "maximum 255 caractères.",

            "age.required" => "L'age est obligatoire.",
            "age.integer" => "L'age doit etre un entier.",
            "age.between" => "L'age doit etre compris entre 3 et 103 ans.",

            "email.required" => "L'Email est obligatoire.",
            "email.email" => "Ceci doit etre un email.",
            "email.unique" => "Cette email existe deja , veuillez en choisir un autre.",

            "tel.required" => "Le numero de telephone est obligatoire.",
            "tel.unique" => "Le numero de telephone appartient deja a un contact.",
            "tel.regex" => "Veuillez entrer un numero de telephone valide.",
        ]);

        if ($validator->fails()) // s'il y a 1 erreur , on est redirigé vers la page precedente
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //si on arrive ici c'est qu'il n'y a plus d'erreurs et on peut
        // donc stocker les informations  dans la table 'contacts' 
        // de la base de données 'agenda0'

        // nous faisons la requete 
        $vouter = Vouter::create([
            "first_name" => $request->prenom,
            "last_name" => $request->nom,
            "email" => $request->email,
            "birthdate" => $request->age,           
            "phone_number" => $request->tel,
            "partie_id" => $request->parti,
            "password" => $request->password,
            ]);
            session(['vouter' => $vouter]);

            return redirect()->route("user.index")->with([
                "success" => "Le compte a été ajouté avec succès",
            ]);
        
    }

    public function edit($id)
    {
        //la methode find permet de fire une requete en se basant
        //sur l'identifiant qui est passé en paramètre
        //en realité elle fait une requete : SELECT * FROM contacts WHERE id=$id

        $contact = Vouter::find($id);
        //Je retourne une vue du nom de edit sur laquelle je vais afficher le formulaire qui me 
        //permet de modifier les informations de $contact ($contact est le contact dont je souhaite
        // modifier les informations. )

        return view("edit", compact('vouter'));
    }

    public function update(Request $request, $id)
    {
        $contact = Vouter::where("id", $id)->first(); // first = fetch
        //Contact::find($id);


        $validator = Validator::make($request->all(), [
            "prenom" => ["required", "string", "min:2", "max:255"],
            "nom" => ["required", "string", "min:2", "max:255"],
            "age" => ["required", "integer", "between:3,103"],
            "email" => ["required", "email", Rule::unique('vouter')->ignore($contact->id)
        ],
            "tel" => ["required", Rule::unique('vouter')->ignore($contact->id), "regex:/^[0-9\S\-\+\(\)]{5,20}$/"],
        ],[
            "prenom.required" => "C'est obligatoire.",
            "prenom.string" => "Veuillez entrer une chaine de caractères.",
            "prenom.name.min" => "On veut au minimum 2 caractères.",
            "prenom.name.max" => "On veut au maximum 255 caractères.",

            "nom.required" => "C'est obligatoire.",
            "nom.string" => "Veuillez entrer une chaine de caractères.",
            "nom.name.min" => "minimum 2 caractères.",
            "nom.name.max" => "maximum 255 caractères.",

            "age.required" => "L'age est obligatoire.",
            "age.integer" => "L'age doit etre un entier.",
            "age.between" => "L'age doit etre compris entre 3 et 103 ans.",

            "email.required" => "L'Email est obligatoire.",
            "email.email" => "Ceci doit etre un email.",
            "email.unique" => "Cette email existe deja , veuillez en choisir un autre.",

            "tel.required" => "Le numero de telephone est obligatoire.",
            "tel.unique" => "Le numero de telephone appartient deja a un contact.",
            "tel.regex" => "Veuillez entrer un numero de telephone valide.",
        ]);

        if ($validator->fails()) // s'il y a 1 erreur , on est redirigé vers la page precedente
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $contact->update($request->all());
        $contact->update([
            "prenom" => $request->first_name,
            "nom" => $request->last_name,
            "age" => $request->age,
            "email" => $request->email,
            "tel" => $request->tel,
            
        ]);

        return redirect()->route("welcome")->with(
            ['success' => "Votre contact a été modifié avec succès."]
        );
        
    }

    public  function destroy($id)
    {
        $contact = Vouter::find($id);

        $contact->delete();

        return redirect()->route('welcome')->with([
            "success" => 'Votre contact a été supprimé avec succès.'
        ]);
    }

}
