<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Objective extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'perspective_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function perspective()
    {
        return $this->belongsTo(Perspective::class);
    }

    public function initiatives()
    {
        return $this->hasMany(Initiative::class);
    }
}
