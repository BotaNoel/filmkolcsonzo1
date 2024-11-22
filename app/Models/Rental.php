<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['renter_name', 'film_id', 'rental_date', 'return_date'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
