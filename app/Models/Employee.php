<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
   
    protected $fillable = ['status','name','birth_date','profession','phone_number','employment_start','hijri_employment_start','bank_account_number','medical_insurance','driving_license','passport_number','passport_end_date','residency_number','residency_end_date'];
    public function branche(){

        return  $this->belongsTo(Branche::class);
    }

    public function computer(){

        return $this->HasOne(Computer::class);
    }
}
