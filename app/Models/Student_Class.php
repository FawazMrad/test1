<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Class extends Model
{
  public function student(){
      return $this->belongsTo(Student::class);
  }
  public function clas(){
      return $this->belongsTo(Clas::class);
  }
    use HasFactory;
}
