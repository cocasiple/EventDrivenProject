<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Payroll extends Model
{
    protected $table = 'payroll'; // Specify the table name

    protected $fillable = [
        'employees_id',
        'start_of_cutoff',
        'end_of_cutoff',
        'total_pay',
    ];
    public function employee()
    {
        return $this->belongsTo(employee::class, 'employees_id');
}
}

