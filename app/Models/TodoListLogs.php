<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoListLogs extends Model
{


    protected $table = 'todo_list_logs';

    protected $fillable =
        [
            'todoListLogsParentTodoIdentifier',
            'todoListLogsText',
        ];




    use HasFactory;
}
