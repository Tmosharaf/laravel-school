<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_roll',
        'class_name',
        'date',
        'status',
    ];

    //present attribute
    public function getPresentAttribute()
    {
        return $this->status == 'present';
    }
    

}
