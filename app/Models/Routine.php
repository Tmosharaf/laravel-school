<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'classes_id',
        'day',
        'time',
        'subject_id',
        'teacher_id'
    ];

    public function class(){
        return $this->belongsTo(Classes::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    protected function days(): Attribute
    {
        return Attribute::make(
            get: function(){

                $days = str_replace(['"', '[', ']'], '', $this->day);
                $days = explode(',', $days);

                return $days;
            }
        );
    }


    
}
