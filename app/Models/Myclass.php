<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Myclass extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'teacher_id',
        'section',
        'school_year',
        'grade_id'
        ];
    
    public function getTeacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }
    
    public function getGrade()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
