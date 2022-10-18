<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'objective_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
}
