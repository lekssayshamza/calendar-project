<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Recurrence;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Event extends Model
{
    protected $fillable = [
        'user_id', // add this to track ownership
        'title', 
        'description', 
        'start_time', 
        'end_time', 
        'all_day', 
        'color',
        'category', 
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'all_day' => 'boolean',
    ];

    // Add user relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recurrence()
    {
        return $this->hasOne(Recurrence::class);
    }


}
