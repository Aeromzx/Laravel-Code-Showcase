<?php

namespace App\Http\Controllers;

use App\Mail\newUser;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    function generatePassword($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function index()
    {
        return view('modules.employee.employee', [
            'users' => User::all(),
            'employees' => Employee::all(),
        ]);
    }

    public function store(Request $request)
    {
        unset($request['_token']);

        if (isset($request->id)) {
            Employee::where('id', "=", $request->id)->update($request->all());

            User::where('employeeKey', "=", $request->id)->update([
                'name' => $request->employeeFirstName . ' ' . $request->employeeLastName,
                'email' => $request->employeeMail,
            ]);

        } else {
            //create
            $password = $this->generatePassword(20);
            Employee::create($request->all());

            $id = DB::getPdo()->lastInsertId();

            User::create([
                'name' => $request->employeeFirstName . ' ' . $request->employeeLastName,
                'email' => $request->employeeMail,
                'password' => Hash::make($password),
                'employeeKey' => $id,
            ]);

            Mail::to($request->employeeMail)->send(new newUser($request->employeeFirstName, $request->employeeMail, $password));

        }
        return redirect(route('employee'));

    }


    public function destroy($id)
    {
        Employee::where('id', "=", $id)->delete();
        User::where('employeeKey', "=", $id)->delete();
        return redirect(route('employee'));
    }

}
