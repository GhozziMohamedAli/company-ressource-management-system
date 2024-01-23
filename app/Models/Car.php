<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CarImages;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['plate_number','type','car_meter','fuel_type','fuel_amount','fuel_cost','sum_fuel','oil_amount','oil_cost','sum_oil','path_license','path_inspection','atonements','battery'];

    public function carImage(){

        return $this->hasMany(CarImages::class);
    }
}
