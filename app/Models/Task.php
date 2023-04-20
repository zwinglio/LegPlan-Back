<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $statusTypes = [
        'not_started' => 'Não começou',
        'in_progress' => 'Em progresso',
        'review' => 'Revisão',
        'completed' => 'Concluído',
    ];

    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'start_date',
        'end_date',
        'department_id',
    ];

    protected $appends = [
        'department_name',
        'responsible_employee',
    ];

    protected $hidden = [
        'action_id',
        'created_at',
        'updated_at',
        'department',
        'department_id'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getDepartmentNameAttribute()
    {
        return $this->department->name;
    }

    public function getResponsibleEmployeeAttribute()
    {
        return $this->department->responsible;
    }

    public function getStatusAttribute($value)
    {
        return $this->statusTypes[$value];
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }
}
