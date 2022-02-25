<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_list';

    protected $fillable =
        [
            'todoListEmployeeIdentifier',
            'todoListCreatedByEmployeeIdentifier',
            'todoListType',
            'todoListTitle',
            'todoListDescription',
            'todoListDeadLine',
        ];


    use HasFactory;
}
