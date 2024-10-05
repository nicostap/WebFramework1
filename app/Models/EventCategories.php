<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategories extends Model
{
    use HasFactory;

    protected $table = 'event_categories';

    protected $fillable = [
        'name',
        'active'
    ];

    public function events()
    {
        return $this->hasMany(Events::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
