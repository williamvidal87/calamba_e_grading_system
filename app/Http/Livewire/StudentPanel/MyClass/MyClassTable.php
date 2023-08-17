<?php

namespace App\Http\Livewire\StudentPanel\MyClass;

use App\Models\ClassStudent;
use App\Models\ClassStudentSubjectGrade;
use App\Models\Myclass;
use Livewire\Component;

class MyClassTable extends Component
{
    protected $listeners = [
        'refresh_my_grade_table' => '$refresh'
    
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.student-panel.my-class.my-class-table',[
            'Myclass_Data' => Myclass::all(),
            'Student_Data' => ClassStudent::all()
            ])->with('getGrade','getTeacher');
    }
    
    
    public function ViewMyGradesModal($class_id,$class_student_id)
    {
        $this->emit('openMyGradesModal');
        $this->emit('MyGrade',$class_student_id,$class_id);
    }
}
