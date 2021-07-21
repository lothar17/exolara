<?php

namespace App\Http\Controllers;

use App\Models\Vouter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
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
       $vouter = Vouter::where('email', $request->email)->first();
        if ($vouter && Hash::check($request->password, $vouter->password))
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
            "first_name" => ["required", "string", "min:2", "max:255"],
            "last_name" => ["required", "string", "min:2", "max:255"],
            "email" => ["required", "email", "unique:vouters"],
            "birthdate" => ["required", "between:3,103"],
            "phone_number" => ["required", "regex:/^[0-9\S\-\+\(\)]{5,20}$/"],
        ],[
            "first_name.required" => "C'est obligatoire.",
            "first_name.string" => "Veuillez entrer une chaine de caractères.",
            "first_name.name.min" => "On veut au minimum 2 caractères.",
            "first_name.name.max" => "On veut au maximum 255 caractères.",

            "last_name.required" => "C'est obligatoire.",
            "last_name.string" => "Veuillez entrer une chaine de caractères.",
            "last_name.name.min" => "minimum 2 caractères.",
            "last_name.name.max" => "maximum 255 caractères.",

            "birthdate.required" => "L'age est obligatoire.",
            "birthdate.integer" => "L'age doit etre un entier.",
            "birthdate.between" => "L'age doit etre compris entre 3 et 103 ans.",

            "email.required" => "L'Email est obligatoire.",
            "email.email" => "Ceci doit etre un email.",
            "email.unique" => "Cette email existe deja , veuillez en choisir un autre.",

            "phone_number.required" => "Le numero de phone_telephone est obligatoire.",
            "phone_number.unique" => "Le numero de phone_telephone appartient deja a un contact.",
            "phone_number.regex" => "Veuillez entrer un numero de telephone valide.",
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
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "birthdate" => $request->birthdate,           
            "phone_number" => $request->phone_number,
            "partie_id" => $request->parti,
            "password" => Hash::make($request->password),
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

       $vouter = Vouter::find($id);
        //Je retourne une vue du nom de edit sur laquelle je vais afficher le formulaire qui me 
        //permet de modifier les informations de $contact ($contact est le contact dont je souhaite
        // modifier les informations. )

        return view("user.edit", compact('vouter'));
    }

    public function update(Request $request, $id)
    {
        $vouter = Vouter::where("id", $id)->first(); // first = fetch
        //Contact::find($id);


        $validator = Validator::make($request->all(), [
            "first_name" => ["required", "string", "min:2", "max:255"],
            "last_name" => ["required", "string", "min:2", "max:255"],
            "birthdate" => ["required", "between:3,103"],
            "email" => ["required", "email", Rule::unique('vouters')->ignore($vouter->id)],
            "phone_number" => ["required", Rule::unique('vouters')->ignore($vouter->id), "regex:/^[0-9\S\-\+\(\)]{5,20}$/"],
        ],[
            "first_name.required" => "C'est obligatoire.",
            "first_name.string" => "Veuillez entrer une chaine de caractères.",
            "first_name.name.min" => "On veut au minimum 2 caractères.",
            "first_name.name.max" => "On veut au maximum 255 caractères.",

            "last_name.required" => "C'est obligatoire.",
            "last_name.string" => "Veuillez entrer une chaine de caractères.",
            "last_name.name.min" => "minimum 2 caractères.",
            "last_name.name.max" => "maximum 255 caractères.",

            "birthdate.required" => "L'age est obligatoire.",
            "birthdate.integer" => "L'age doit etre un entier.",
            "birthdate.between" => "L'age doit etre compris entre 3 et 103 ans.",

            "email.required" => "L'Email est obligatoire.",
            "email.email" => "Ceci doit etre un email.",
            "email.unique" => "Cette email existe deja , veuillez en choisir un autre.",

            "phone_number.required" => "Le numero de telephone est obligatoire.",
            "phone_number.unique" => "Le numero de telephone appartient deja a un contact.",
            "phone_number.regex" => "Veuillez entrer un numero de telephone valide.",
        ]);

        if ($validator->fails()) // s'il y a 1 erreur , on est redirigé vers la page precedente
        {
            // return redirect()->back()->withErrors($validator)->withInput();
            var_dump ($vouter);
        }

        // $contact->update($request->all());
        $vouter->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "birthdate" => $request->birthdate,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            
        ]);

        return redirect()->route("welcome")->with(
            ['success' => "Votre contact a été modifié avec succès."]
        );
        
    }

    public  function destroy($id)
    {
        $vouter = Vouter::find($id);

        $vouter->delete();

        return redirect()->route('welcome')->with([
            "success" => 'Votre contact a été supprimé avec succès.'
        ]);
    }

}
