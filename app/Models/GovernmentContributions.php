<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
class GovernmentContributions extends Model
{
    use HasFactory;

    // Define the table name if different from the model name in snake_case and plural form
    protected $table = 'government_contributions';

    // Specify the fillable attributes
    protected $fillable = [
        'employees_id',
        'sss_contribution',
        'pagibig_contribution',
        'philhealth_contribution',
        'tin_number',
    ];

    // Define relationships (if any)
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employees_id');
    }
}
