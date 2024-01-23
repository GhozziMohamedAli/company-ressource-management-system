<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
class CarImages extends Model
{
    use HasFactory;
    protected $fillable = ['url'];
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
