<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'date', 'location', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function attendees(): HasMany
    {
        return $this->hasMany(Attendee::class);
    }

    protected $casts = [
        'date' => 'datetime',
    ];
}
