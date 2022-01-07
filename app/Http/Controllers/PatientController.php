<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class PatientController extends Controller
{
    public function index(UserRepository $userRepo)
    {


        $users = $userRepo->getAllPatients();

        return view('patients.list', [
            "patientsList" => $users,
            'footerYear' => date('Y')
        ]); //doctors - nazwa folderu, list- nazwa pliku blade.php 
    }
    public function show(UserRepository $userRepo, $id)
    {
        $patient = $userRepo->find($id);
        return view('patients.show', ["patient" => $patient, 'footerYear' => date('Y')]); //doctors - nazwa folderu, list- nazwa pliku blade.php 

    }
    public function create()
    {

        return view('patients.create', ['footerYear' => date('Y')]);
    }

    public function store(Request $request)
    {
        $patient = new User;
        $patient->name = $request->input('name');
        $patient->lastname = $request->input('surname');
        $patient->password = bcrypt($request->input('password'));
        $patient->email = $request->input('email');
        $patient->phone = $request->input('phone');
        $patient->pesel = $request->input('pesel');
        $patient->status = $request->input('status');
        $patient->type = 'patient';
        $patient->save();



        return redirect()->action('App\Http\Controllers\PatientController@index');
    }
}
