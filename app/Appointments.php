<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $fillable = [
        'title', 'date', 'start_time', 'end_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
