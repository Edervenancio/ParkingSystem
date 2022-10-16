<?php

namespace PSystem\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MotorController extends Controller {

    public function indexMotor() {
        $sql = DB::table('motorowner')->orderBy('id')->paginate(25);
        return view('vehicle.indexMotor', compact('sql'));
    }

    public function createMotor() {
        return view('vehicle.createMotor');
    }





    public function motorStore(Request $request) {
        $parameters = [
            $request->name,
            $request->vehicle,
            $request->motorBoard,
            $request->phone,
            $request->rg,
            $request->cpf,
            $request->timeAllowed,
            $request->value
        ];

        if (Str::length($request->motorBoard) < 7 || Str::contains($request->motorBoard, "_")) {
            return redirect()->back()->with('error', 'Car board invalid');
            exit();
        } else if (Str::length($request->cpf) < 14 || Str::contains($request->cpf, "_", "__", "___")) {
            return redirect()->back()->with('error', 'CPF INVALID');
            exit();
        }


        DB::insert("INSERT INTO motorowner (name, vehicle, motorBoard, phone, rg, cpf, timeAllowed, value) VALUES 
        (?, ?, ?, ?, ?, ?, ?, ?)", $parameters);

        $id = DB::getPdo()->lastInsertId();

        DB::insert("INSERT INTO log (action, tableLog, idAffected) VALUES 
        (?, ?, ?)", ['insert', 'motorcycle', $id]);
        return redirect()->action([MotorController::class, 'indexMotor']);
    }



    public function showMotor($id) {
        $sql = DB::SELECT("SELECT * FROM motorowner where id = ?", [$id]);

        if (!empty($sql)) {
            DB::insert("INSERT INTO log (action, tableLog, idAffected) VALUES 
            (?, ?, ?)", ['show', 'motorcycle', $id]);
            return view('vehicle.motorShow')->with('sql', $sql);
        } else {
            return redirect()->action([MotorController::class, 'vehicle.indexMotor']);
        }
    }


    public function searchMotor() {
        $search_text = $_GET['query'];

        $motor = DB::SELECT("SELECT * FROM motorowner WHERE id LIKE '%{$search_text}%'
                    OR vehicle LIKE '%{$search_text}%' OR  NAME LIKE '%{$search_text}%'");

        DB::insert("INSERT INTO log (action, tableLog) VALUES 
            (?, ?)", ['search', 'motorcycle']);

        return view('vehicle.searchMotor', compact('motor'));
    }
}
