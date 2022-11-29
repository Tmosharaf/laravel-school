<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UpcomingEvent extends Model
{
    use HasFactory;


    protected $fillable = [
        'event_name',
        'description',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime:Y-m-d',
    ];

    // protected function upcoming(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => ucfirst($value),
    //     );
    // }

    protected function isExpired(): Attribute
    {
        return Attribute::make(
            get : function(){
                if(Carbon::parse($this->date) <  Carbon::today()){
                    return true;
                }
                
            }
        );
    }
}

