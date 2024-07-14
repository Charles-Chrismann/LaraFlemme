<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ApiKey extends Model
{
    use HasFactory;

    protected $table = 'api_keys'; 
    protected $primaryKey = 'id';
    protected $fillable = [
      'uuid',
      'user_id',
      'name',
      'key'
  ];

  public function user()
    {
        return $this->belongsTo(User::class);
    }

}
