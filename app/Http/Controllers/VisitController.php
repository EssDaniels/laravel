<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use App\Repositories\VisitRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class VisitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(VisitRepository $visitRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }

        $visits = $visitRepo->getAll();

        return view('visits.list', ["visits" => $visits, 'footerYear' => date('Y')]); //doctors - nazwa folderu, list- nazwa pliku blade.php 
    }
    public function create(UserRepository $userRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $doctorList = $userRepo->getAllDoctores();
        $patientsList = $userRepo->getAllPatients();


        return view('visits.create', [
            'doctors' => $doctorList,
            'patients' => $patientsList,
            'footerYear' => date('Y')
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $visit = new Visit;
        $visit->doctor_id = $request->input('doctor');
        $visit->patient_id = $request->input('patient');
        $visit->date = $request->input('date');
        $visit->save();

        $patient = User::find($visit->patient_id);

        Mail::send('emails.visit', ['visit' => $visit], function ($m) use ($visit, $patient) {
            $m->to($patient->email, $patient->name)->subject('Nowa wizyta');
        });




        return redirect()->action('App\Http\Controllers\VisitController@index');
    }
}
