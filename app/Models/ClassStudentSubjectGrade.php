<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudentSubjectGrade extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'class_id',
    'class_student_id',
    'class_subject_id',
    'first_quarter',
    'second_quarter',
    'third_quarter',
    'fourth_quarter'
    ];
    
    
    public function getClassSubjectID()
    {
        return $this->belongsTo(ClassSubject::class,'class_subject_id')->with('getSubject');
    }
}
