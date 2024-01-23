<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branche extends Model
{
    use HasFactory;

    protected $fillable = ['name','adresse','phone_number'];

    public function institution(){

        return $this->belongsTo(Institution::class);
    }

    

    public function employees(){

        return $this->hasMany(Employee::class);
    }
    

}
