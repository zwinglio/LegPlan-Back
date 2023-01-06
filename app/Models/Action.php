<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function initiative()
    {
        return $this->belongsTo(Initiative::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
