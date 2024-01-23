<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = ['status','serial_number','description','branche_name'];
    


    public function employee(){

        return $this->belongsTo(Employee::class);
    }
}
