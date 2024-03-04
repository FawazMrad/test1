<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en','name_ar'
    ];


    public function student_class(){
        return $this->hasMany(Student_Class::class);
    }
}
