<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{

    public function index(UserRepository $userRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }


        $users = $userRepo->getAllPatients();

        return view('patients.list', [
            "patientsList" => $users,
            'footerYear' => date('Y')
        ]); //doctors - nazwa folderu, list- nazwa pliku blade.php 
    }
    public function show(UserRepository $userRepo, $id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $patient = $userRepo->find($id);
        return view('patients.show', ["patient" => $patient, 'footerYear' => date('Y')]); //doctors - nazwa folderu, list- nazwa pliku blade.php 

    }
    public function create()
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }

        return view('patients.create', ['footerYear' => date('Y')]);
    }

    public function store(Request $request)
    {

        $request->validate([            //validacja : reszta w dokumentacji laravel
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5,confirmed',
            'phone' => 'required',
            'pesel' => 'required'

        ]);

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



        return view('patients.confirm', ["footerYear" => date('Y')]);
    }
}
