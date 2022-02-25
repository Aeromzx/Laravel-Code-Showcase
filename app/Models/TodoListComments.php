<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoListComments extends Model
{

    protected $table = 'todo_list_comments';

    protected $fillable =
        [
            'todoListCommentsParentTodoIdentifier',
            'todoListCommentsText',
            'todoListCommentsEmployeeIdentifier',
        ];

    public function getEmployeeData()
    {
        return $this->hasOne(Employee::class, 'id', 'todoListCommentsEmployeeIdentifier');
    }

    use HasFactory;
}
