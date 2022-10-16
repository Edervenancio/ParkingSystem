<?php

namespace PSystem\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller {


    public function indexCar() {
        // $sql = DB::SELECT("SELECT * FROM carowner");
        $sql = DB::table('carowner')->orderBy('id')->paginate(25);

        // return view('vehicle.indexCar')->with('sql', $sql);
        return view('vehicle.indexCar', compact('sql'));
    }


    public function createCar() {
        return view('vehicle.createCar');
    }





    public function carStore(Request $request) {
        $parameters = [
            $request->name,
            $request->vehicle,
            $request->carBoard,
            $request->phone,
            $request->rg,
            $request->cpf,
            $request->timeAllowed,
            $request->value
        ];


        if (Str::length($request->carBoard) < 7 || Str::contains($request->carBoard, "_")) {
            return redirect()->back()->with('error', 'Car board invalid');
            exit();
        } else if (Str::length($request->cpf) < 14 || Str::contains($request->cpf, "_", "__", "___")) {
            return redirect()->back()->with('error', 'CPF INVALID');
            exit();
        }

        DB::insert("INSERT INTO carowner (name, vehicle, carBoard, phone, rg, cpf, timeAllowed, value) VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?)", $parameters);

        $id = DB::getPdo()->lastInsertId();

        DB::insert("INSERT INTO log (action, tableLog, idAffected) VALUES 
        (?, ?, ?)", ['insert', 'car', $id]);
        return redirect()->action([CarController::class, 'indexCar']);
    }



    public function showCar($id) {


        $sql = DB::SELECT("SELECT * FROM carowner where id = ?", [$id]);

        if (!empty($sql)) {
            DB::insert("INSERT INTO log (action, tableLog, idAffected) VALUES 
            (?, ?, ?)", ['show', 'car', $id]);
            return view('vehicle.carShow')->with('sql', $sql);
        } else {
            return redirect()->action([CarController::class, 'vehicle.indexCar']);
        }
    }

    public function searchCar() {
        $search_text = $_GET['query'];

        $car = DB::SELECT("SELECT * FROM carowner WHERE id LIKE '%{$search_text}%'
              OR vehicle LIKE '%{$search_text}%' OR  NAME LIKE '%{$search_text}%'");

        DB::insert("INSERT INTO log (action, tableLog) VALUES 
        (?, ?)", ['search', 'car']);

        return view('vehicle.searchCar', compact('car'));
    }
}
