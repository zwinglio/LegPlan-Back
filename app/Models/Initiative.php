<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'objective_id',
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
