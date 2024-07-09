<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
      'uuid',
      'title',
      'artist',
      'image',
      'music',
      'display',
      'play_count'
    ];
}
