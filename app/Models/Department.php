<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'responsible_id',
        'email',
        'phone',
    ];

    protected $casts = [
        'responsible_id' => 'integer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id', 'id', 'users');
    }
}
