<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'description', 'location', 'activity_type', 'cost', 'total_child', 'organizer', 'datetime', 'content'];

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class, 'activity_id');
    }
}
