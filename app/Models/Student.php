<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'roll',
        'email',
        'phone',
        'age',
        'gender',
        'fathers_name',
        'mothers_name',
        'address',
        'image',
        'password',
        'group',
        'session',
        'classes_id',
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes');
    }

    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance', 'student_roll', 'roll');
    }

    public function getStatusAttribute()
    {
        $attendance = $this->attendances()->where('date', date('d-m-Y'))->first();

        if($attendance) {
            return 'Present';
        }else{
            return 'Absent';
        }
    }
}
