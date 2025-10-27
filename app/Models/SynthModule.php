<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SynthModule extends Model
{
    protected $fillable = ['name', 'description', 'image_url', 'api_id'];
}
