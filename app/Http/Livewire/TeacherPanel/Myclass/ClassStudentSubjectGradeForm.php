<?php

namespace App\Http\Livewire\TeacherPanel\Myclass;

use App\Models\ClassStudent;
use App\Models\ClassStudentSubjectGrade;
use App\Models\ClassSubject;
use App\Models\Myclass;
use Livewire\Component;

class ClassStudentSubjectGradeForm extends Component
{
    public  $grade,
            $section,
            $schoolyear,
            $student_name,
            $MyclassID;
    public  $classStudentID;
    public  $orderProducts = [];
    public  $first_quarter = [];
    public  $second_quarter = [];
    public  $third_quarter = [];
    public  $fourth_quarter = [];
    public  $result;
    public  $average=0;
    public  $total_subject;
    
    protected $listeners = [
    'addStudentGrades',
    ];
    
    public function render()
    {
        return view('livewire.teacher-panel.myclass.class-student-subject-grade-form',[
            'Subject_Data' => ClassSubject::where('class_id',$this->MyclassID)->get()
            ])->with('getStudent');
    }
    
    public function addStudentGrades($classStudentID,$MyclassID)
    {
        $this->MyclassID=$MyclassID;
        $this->classStudentID=$classStudentID;
        $Student_Data=ClassStudent::find($this->classStudentID)->get();
        foreach ($Student_Data as $student_data) {
        }
        $this->student_name     = $student_data->getStudent->name;
        $Student_Record = Myclass::find($this->MyclassID)->get();
        foreach ($Student_Record as $student_record) {
        }
        $this->grade     = $student_record->getGrade->grade_name;
        $this->section   = $student_record->section;
        $this->schoolyear= $student_record->school_year;
        
        $Find_Subject = ClassSubject::where('class_id',$this->MyclassID)->get();
        foreach ($Find_Subject as $find_subject) {
            $Check_Sub_Exist=ClassStudentSubjectGrade::where('class_subject_id',$find_subject->id)->where('class_student_id',$this->classStudentID)->get();
            $check_exist=false;
            foreach ($Check_Sub_Exist as $check_sub_exist) {
                $check_exist=true;
            }
            if($check_exist==false)
            {
                $data = ([
                    'class_id'                      => $this->MyclassID,
                    'class_student_id'              => $this->classStudentID,
                    'class_subject_id'              => $find_subject->id
                ]); 
                ClassStudentSubjectGrade::create($data);
            }
        }
        
        $Student_Subject_Grade = ClassStudentSubjectGrade::where('class_id',$this->MyclassID)->where('class_student_id',$this->classStudentID)->get();
        foreach ($Student_Subject_Grade as $index => $student_subject_grade){
            $this->orderProducts[$index] = [
            'id' => $student_subject_grade->id,
            'subject_name'=>$student_subject_grade->getClassSubjectID->getSubject->subject_name,
            'class_id'=>$student_subject_grade->class_id,
            'class_student_id'=>$student_subject_grade->class_student_id,
            'class_subject_id' => $student_subject_grade->class_subject_id,
            'first_quarter' => $student_subject_grade->first_quarter,
            'second_quarter' => $student_subject_grade->second_quarter,
            'third_quarter' => $student_subject_grade->third_quarter,
            'fourth_quarter' => $student_subject_grade->fourth_quarter
            ];
        }
        $this->total_subject = count($this->orderProducts);    
    }
    
    public function store()
    {
        foreach ($this->orderProducts as $index => $data) {
            ClassStudentSubjectGrade::find($data['id'])->update($data);
        }
        
        $this->emit('alert_update');
        $this->emit('closeStudentSubectGradeModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function closeStudentSubjectGradeForm()
    {
        $this->emit('closeStudentSubectGradeModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
