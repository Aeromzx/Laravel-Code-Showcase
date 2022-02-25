<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('modules.dashboard.dashboard', [
            'projects' => Projects::where('employeeKey', "=", Auth::user()->employeeKey)->get()
        ]);

    }


    public function store()
    { //Nothing to Change/Create 22.02.2022

    }

    public function delete()
    { //Nothing to Delete 22.02.2022

    }

}
