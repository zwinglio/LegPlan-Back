<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mission',
        'vision',
        'values',
        'plan_start_date',
        'plan_end_date',
    ];

    protected $table = 'company';
}
