<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email', 
        'cpf',
        'phone',
        'gender',
        'birth_date',
        'status',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
