<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable =[
        'employee_id',
        'basic_salary',
        'allowances_description',
        'allowances_amount',
        'deductions_description',
        'deductions_amount',
        'net_salary',
        'payment_status'
        ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
