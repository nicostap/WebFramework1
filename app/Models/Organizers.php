<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizers extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'facebook_link',
        'x_link',
        'website_link',
    ];

    /**
     * Get the events organized by the organizer.
     */
    public function events()
    {
        return $this->hasMany(Events::class);
    }
}
