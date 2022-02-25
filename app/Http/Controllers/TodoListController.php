<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\TodoList;
use App\Models\TodoListComments;
use App\Models\TodoListLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoListController extends Controller
{
    public function index()
    {
        return view('modules.todoList.todoList',
            [
                'employees' => Employee::all(),
                'todos' => TodoList::all(),
                'todoComments' => TodoListComments::all(),
                'todoLogs' => TodoListLogs::all(),
            ]
        );
    }

    public function create(Request $request)
    {
        unset($request['_token']);
        TodoList::create($request->all());

        $id = DB::getPdo()->lastInsertId();
        TodoListLogs::create(['todoListLogsParentTodoIdentifier' => $id, 'todoListLogsText' => "Die Aufgabe wurde Angelegt"]);
        return redirect(route('todoList'));
    }



    public function change(Request $request, $id)
    {
        unset($request['_token']);
        TodoList::where('id', "=", $id)->update($request->all());
        TodoListLogs::create(['todoListLogsParentTodoIdentifier' => $id, 'todoListLogsText' => "Das Todo wurde bearbeitet!"]);
        return redirect(route('todoList'));
    }


    public function addComment($id, $employeeId , Request $request)
    {
        TodoListComments::create([
            'todoListCommentsParentTodoIdentifier' => $id,
            'todoListCommentsText' => $request -> todoListCommentsText,
            'todoListCommentsEmployeeIdentifier' => $employeeId,
        ]);
        TodoListLogs::create(['todoListLogsParentTodoIdentifier' => $id, 'todoListLogsText' => "Todo Wurde Kommentiert"]);
        return redirect(route('todoList'));

    }


    public function destroy($id)
    {
        return redirect(route('todoList'));
    }
}
