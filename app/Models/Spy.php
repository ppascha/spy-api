<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'agency_id', 'country_of_operation', 'date_of_birth', 'date_of_death'];

    public function spies()
    {
      return $this->belongsTo(Agency::class);
    }
}
