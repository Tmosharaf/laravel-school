<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'class_name', 'name');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'class_teacher', 'name');
    }

    public function routines()
    {
        return $this->hasMany(Routine::class);
    }

    protected function todayRoutine(): Attribute
    {
        return Attribute::make(
            get: function () {

                $routines = Routine::where('classes_id', $this->id)
                    ->orderBy('time', 'ASC')
                    ->get();

                //filter by day from Datbase [Day] Column
                $routines = $routines->map(function ($item) {
                    //item day all are in a string format, so first convert it into an array.
                    $days = str_replace(['"', '[', ']'], '', $item->day);
                    $days = explode(',', $days);
                    //check day column from database with today
                    if (in_array(strtolower(date('l')), $days)) {
                        return $item;
                    }
                });
                $routines =  $routines->filter(); //remove null item from colection
                return $routines;
            }
        );
    }
}
