<?php

namespace App\Models;

use Cassandra\Custom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    protected $table = "projects";

    protected $fillable = [
        'employeeKey',
        'customerKey',

        'projectName',
        'projectDescription',
        'projectPrioritization',
        'projectStartDate',
        'projectDeadline',
    ];


    public function customer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customerKey');
    }


    use HasFactory;
}
