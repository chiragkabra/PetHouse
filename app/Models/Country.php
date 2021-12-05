<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hostel;

class Country extends Model
{
    use HasFactory;
 function hostels()
{
     return $this->belongsTo(Hostel::class,'country','id');
}
}
