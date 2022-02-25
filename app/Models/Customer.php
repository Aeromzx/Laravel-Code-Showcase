<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "customer";


    /**
     * @var array
     */
    protected $fillable = [
        'customerType',
        'customerCompanyName',

        'customerContactPersonFirstName',
        'customerContactPersonLastName',
        'customerContactPersonPhone',
        'customerContactPersonMail',

        'customerCompanyLocationStreet',
        'customerCompanyLocationPostCode',
        'customerCompanyLocationCity',

        'maintenanceContractKey',
    ];


    use HasFactory;
}
