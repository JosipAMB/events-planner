<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'location',
        'max_participants',
    ];

    protected $casts = [
        'start_date' => 'datetime',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function spotsLeft(): int
    {
        return $this->max_participants - $this->registrations()->count();
    }
}