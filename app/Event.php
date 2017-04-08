<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable =
        [
            'date',
            'meal_id',
        ];

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}