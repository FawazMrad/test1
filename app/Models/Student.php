<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $fillable = [
        'user_ID',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student_class(){
        return $this->hasMany(Student_Class::class);
    }
}
