<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spy extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'agency_id', 'country_of_operation', 'date_of_birth', 'date_of_death'];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }

    public function getOperationalPeriodAttribute()
    {
        $start = $this->date_of_birth->format('Y');
        $end = $this->date_of_death ? $this->date_of_death->format('Y') : 'Present';
        return "$start - $end";
    }
}
