<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recurrence extends Model
{
    protected $fillable = ['event_id', 'frequency', 'interval', 'end_date'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
