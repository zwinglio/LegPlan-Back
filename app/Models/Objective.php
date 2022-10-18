<?php

namespace App\Models;

use App\Models\Action;
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

    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
