<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prospect extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'profile_image'];
    protected $quarded = [];

    public function contact()
    {
        return $this->hasOne(\App\Models\ProspectContact::class);
    }

    public function getPrettyCreatedAttribute()
    {
        return date('F d, Y h:i', strtotime($this->created_at));
    }
}
