<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extinguisher extends Model
{
    use HasFactory;

    protected $fillable = ["number","branche","storehouse","end_date"];
}
