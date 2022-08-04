<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objet;
use Illuminate\Support\Facades\Validator;

class ObjetController extends Controller
{
    //
    function getAllObjets()
    {
        return Objet::all();
    }


    function getObjet($id)
    {
        return Objet::where('id', $id)->get();
    }

    function addObjet(Request $request)
    {
        $rules = array(
            "location" => "required"
        );

        var_dump( $request->location);

        $validator = Validator::make($request->all(), $rules);

        if ($validator->failed()) {
            return $validator->errors();
        } else {
            $objet = new Objet;
            $objet->categorie_name = $request->categorie_name;
            $objet->lost_date = $request->lost_date;
            $objet->find_date = $request->find_date;
            $objet->location = $request->location;
            $result = $objet->save();
            if ($result) {
                return [
                    "result" => "Data has been saved",
                    "data" => Objet::all()
                ];
            } else {
                return [
                    "result" => "Operation failed",
                ];
            }
        }
    }


    function updateObjet(Request $request)
    {
        $objet = Objet::find($request->id);

        $objet->categorie_name = $request->categorie_name;
        $objet->lost_date = $request->lost_date;
        $objet->find_date = $request->find_date;
        $objet->location = $request->location;

        $result = $objet->save();

        if ($result) {
            return [
                "result" => "Data has been updated",
                "data" => [$objet]
            ];
        } else {
            return [
                "result" => "Operation failed",
            ];
        }
    }

    function deleteObjet($id)
    {
        $objet = Objet::find($id);
        $result = $objet->delete();
        if ($result) {
            return [
                "result" => "Objet " . $id . " has been delete",
            ];
        } else {
            return [
                "result" => "Operation failed",
            ];
        }
    }

    function search($categorie_name)
    {
        return Objet::where('categorie_name', 'like', '%' . $categorie_name . '%')->get();
        // return Objet::where('categorie_name',$categorie_name)->get();
    }
}
