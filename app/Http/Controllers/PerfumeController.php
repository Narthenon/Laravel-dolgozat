<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function getPerfumes() {

        $perfumes = Perfume::all();

        return view( "perfumes" ,[
        "perfumes" => $perfumes
]);
}

    public function newPerfume() {

        return view( "new_perfume" );
}

    public function storePerfume( Request $request ) {
        $request->validate([
                "name" => "required",
                "type" => "required",
                "price" => "required|int"
            ], [
                "name.required" => "Írja be nevet",
                "type.required" => "írja be a tipust",
                "price.required" => "írja be az árat"
            ]);
        $perfume = new Perfume;

        $perfume->name = $request->name;
        $perfume->type = $request->type;
        $perfume->price = (int)$request->price;

        $perfume->save();

        return redirect( "/" );
    }

    public function editPerfume( $id ) {

        $perfume = Perfume::find( $id );

        return view( "edit_perfume", [
            "perfume" => $perfume
        ]);
    }

    public function updatePerfume( Request $request, Perfume $perfumes ) {
        $perfume->update([
            "name" => $request->name,
            "type" => $request->type,
            "price" => $request->price
        ]);
    }

    public function deletePerfume( $id ) {

        $perfume = Perfume::find( $id );
        $perfume->delete();

        return redirect( "/perfumes" );
    }
}