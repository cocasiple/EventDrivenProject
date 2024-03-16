<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;

    protected $fillable = [
        'employees_id',
        'start_leave',
        'end_leave',
        'leave_type',
        'status',

    ];
}
