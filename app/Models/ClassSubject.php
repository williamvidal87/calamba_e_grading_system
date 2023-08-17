<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'class_id',
    'subject_id'
    ];
    
    public function getSubject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
