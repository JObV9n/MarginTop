<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'event_id'];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
