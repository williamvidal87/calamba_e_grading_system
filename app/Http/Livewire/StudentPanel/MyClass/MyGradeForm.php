<?php

namespace App\Http\Livewire\StudentPanel\MyClass;

use App\Models\ClassStudent;
use App\Models\ClassStudentSubjectGrade;
use App\Models\ClassSubject;
use App\Models\Myclass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDF;

class MyGradeForm extends Component
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
    'MyGrade',
    ];
    
    public function render()
    {
        return view('livewire.student-panel.my-class.my-grade-form');
    }
    
    
    public function MyGrade($classStudentID,$MyclassID)
    {
        $this->MyclassID=$MyclassID;
        $this->classStudentID=$classStudentID;
        $Student_Data=ClassStudent::where('id',$this->classStudentID)->where('student_id',Auth::user()->id)->get();
        foreach ($Student_Data as $student_data) {
        }
        $this->student_name     = $student_data->getStudent->name;
        $Student_Record = Myclass::where('id',$this->MyclassID)->get();
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
    
    public function closeMyGradeForm()
    {
        $this->emit('closeMyGradesModal');
        $this->emit('refresh_my_grade_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PrintStudentGrades()
    
    {
        date_default_timezone_set('Etc/GMT-8');
        $StudentID=ClassStudent::where('id',$this->classStudentID)->first();
        $StudentInfo=User::where('id',$StudentID->student_id)->first();
        //age check
        $newDate = date("m/d/Y", strtotime($StudentInfo->birth_date));  
        $birthDate = $newDate;
        $birthDate = explode("/", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
        $check_grade=Myclass::where('id',$this->MyclassID)->first();
        $Check_Principal=User::where('id',1)->first();
        // dd($check_grade->school_year);
        $pdfContent = PDF::loadView('livewire.print-form.print-grade',[
            'name' =>  $StudentInfo->name,
            'age' =>  $age,
            'sex' =>  $StudentInfo->getSex->sex_name,
            'grade' =>  $check_grade->getGrade->grade_name,
            'section' =>  $check_grade->section,
            'school_year' =>  $check_grade->school_year,
            'lrn' =>  $StudentInfo->lrn,
            'teacher_name' =>  $check_grade->getTeacher->name,
            'principal_name' =>  $Check_Principal->name,
            'total_subject' =>  0,
            'total_average' =>  0,
            'StudentGrade' =>  ClassStudentSubjectGrade::where('class_student_id',$this->classStudentID)->where('class_id',$this->MyclassID)->get(),
        ])->setPaper('Letter', 'landscape')->output();
        return response()->streamDownload(fn () => print($pdfContent),$StudentInfo->lrn."_Grade.pdf");
        
    }
}
