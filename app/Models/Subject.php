<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_name',
        'subject_code',
        'classes_id'
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'classes_id', 'id');
    }
}
