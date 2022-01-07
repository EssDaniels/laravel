<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllDoctores()
    {
        return $this->model->where('type', 'doctor')->orderBy('name', 'asc')->get();
    }

    public function getDoctorStatistics()
    {
        return DB::table('users')->select(DB::raw('count(*) as user_count, status'))->where('type', 'doctor')->groupBy('status')->get();
    }
    public function getDoctorBySpecialization($id)
    {
        return $this->model->where('type', 'doctor')->whereHas('specializations', function ($q) use ($id) {
            $q->where('specializations.id', $id);
        })->orderBy('name', 'asc')->get();
    }
    public function getAllPatients()
    {
        return $this->model->where('type', 'patient')->orderBy('name', 'asc')->get();
    }
}
