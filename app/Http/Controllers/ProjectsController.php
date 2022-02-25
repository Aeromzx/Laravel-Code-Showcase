<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        return view('modules.projects.projects', [
            'employees' => Employee::all(),
            'customers' => Customer::all(),
            'projects' => Projects::all(),
        ]);

    }

    public function store(Request $request)
    {
        if (isset($request->id)) {
            unset($request['_token']);
            Projects::where('id', "=", $request -> id)->update($request -> all());
        } else {
            unset($request['_token']);
            Projects::create($request->all());
        }
        return redirect(route('projects'));

    }

    public  function destroy($id)
    {
        Projects::where('id', "=", $id)->delete();
        return redirect(route('projects'));
    }

}
