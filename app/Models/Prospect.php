<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','profile_image'];
    protected $quarded = [];

    public function getPrettyCreatedAttribute()
    {
        return date('F d, Y h:i',strtotime($this->created_at));
    }
}
