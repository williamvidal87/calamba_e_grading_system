<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudent extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'class_id',
    'student_id'
    ];
    
    public function getStudent()
    {
        return $this->belongsTo(User::class,'student_id');
    }
}
