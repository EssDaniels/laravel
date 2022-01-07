<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class DoctorController extends Controller
{

    public function index(UserRepository $userRepo)
    {
        $statistis = $userRepo->getDoctorStatistics();

        $users = $userRepo->getAllDoctores();

        return view('doctors.list', [
            "doctorsList" => $users,
            'footerYear' => date('Y'),
            'statistic' => $statistis
        ]); //doctors - nazwa folderu, list- nazwa pliku blade.php 
    }
    public function listBySpecialization(UserRepository $userRepo, $id)
    {
        $statistis = $userRepo->getDoctorStatistics();

        $users = $userRepo->getDoctorBySpecialization($id);

        return view('doctors.list', [
            "doctorsList" => $users,
            'footerYear' => date('Y'),
            'statistic' => $statistis
        ]); //doctors - nazwa folderu, list- nazwa pliku blade.php 
    }
    public function show(UserRepository $userRepo, $id)
    {
        $doctor = $userRepo->find($id);
        return view('doctors.show', ["doctor" => $doctor, 'footerYear' => date('Y')]); //doctors - nazwa folderu, list- nazwa pliku blade.php 

    }



    public function edit(UserRepository $userRepo, $id)
    {
        $doctor = $userRepo->find($id);
        $specializations = Specialization::all();
        return view('doctors.edit', ['specializations' => $specializations, "doctor" => $doctor, 'footerYear' => date('Y')]);
    }

    public function create()
    {
        $specializations = Specialization::all();
        return view('doctors.create', ['specializations' => $specializations, 'footerYear' => date('Y')]);
    }

    public function store(Request $request)
    {
        $request->validate([            //validacja : reszta w dokumentacji laravel
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phone' => 'required',
            'pesel' => 'required'

        ]);
        $doctor = new User;
        $doctor->name = $request->input('name');
        $doctor->lastname = $request->input('surname');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->pesel = $request->input('pesel');
        $doctor->status = $request->input('status');
        $doctor->type = 'doctor';
        $doctor->save();

        $doctor->specializations()->sync($request->input('specializations')); //dodawanie do bazy id specjalizaji połączonych w nowym użytkowniekiem

        return redirect()->action('App\Http\Controllers\DoctorController@index');
    }
    public function editStore(Request $request)
    {
        $doctor = User::find($request->input('id'));
        $doctor->name = $request->input('name');
        $doctor->lastname = $request->input('surname');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->pesel = $request->input('pesel');
        $doctor->status = $request->input('status');
        $doctor->type = 'doctor';
        $doctor->save();

        $doctor->specializations()->sync($request->input('specializations')); //dodawanie do bazy id specjalizaji połączonych w nowym użytkowniekiem

        return redirect()->action('App\Http\Controllers\DoctorController@index');
    }
    public function delete(UserRepository $userRepo, $id)
    {
        $userRepo->delete($id);
        return redirect('doctors');
    }
}
