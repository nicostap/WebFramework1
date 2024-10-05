<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = [
        'title',
        'venue',
        'date',
        'start_time',
        'description',
        'booking_url',
        'tags',
        'organizer_id',
        'event_category_id',
        'active'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i',
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizers::class);
    }

    public function eventCategory()
    {
        return $this->belongsTo(EventCategories::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
