<?php

namespace App\Http\Livewire\TeacherPanel\Myclass;

use App\Models\ClassStudent;
use App\Models\ClassStudentSubjectGrade;
use App\Models\Grade;
use App\Models\Myclass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use PDF;

class MyclassForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $grade_id,
            $section,
            $school_year;
    public  $MyclassID;
    public  $MyclassStudentID;
    public  $edit_data=0;
    
    protected $listeners = [
    'editMyclassData',
    'refresh_myclassform' => '$refresh',
    'deleteClassStudentID'
    ];
    
    public function store()
    {
            $this->validate([
                'grade_id'      => 'required',
                'section'       => 'required',
                'school_year'   => 'required',
            ]);
        
        $this->data = ([
            'grade_id'                      => $this->grade_id,
            'section'                       => $this->section,
            'school_year'                   => $this->school_year
        ]); 
        
        try {
            if($this->MyclassID){
                Myclass::find($this->MyclassID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                $show=Myclass::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeMyclassModal');
        $this->emit('refresh_my_class_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->edit_data=0;
    }

    public function editMyclassData($MyclassID)
    {
        $this->MyclassID=$MyclassID;
        $DATA=Myclass::find($this->MyclassID);
        $this->grade_id     = $DATA['grade_id'];
        $this->section      = $DATA['section'];
        $this->school_year  = $DATA['school_year'];
        $this->edit_data=1;
    
    }
    
    public function render()
    {
        return view('livewire.teacher-panel.myclass.myclass-form',[
            'Grade_Data' => Grade::all(),
            'ClassStudent_Data' => ClassStudent::where('class_id',$this->MyclassID)->get()
            ])->with('getStudent');
    }
    
    public function enrollStudent()
    {
        $this->emit('openEnrollStudentModal');
        $this->emit('EnrollStudent',$this->MyclassID);
    }
    
    public function classSubject()
    {
        $this->emit('openClassSubjectModal');
        $this->emit('addClassSubject',$this->MyclassID);
    }
    
    public function ViewStudentGrades($classStudentID)
    {
        $this->emit('openStudentGradesModal');
        $this->emit('addStudentGrades',$classStudentID,$this->MyclassID);
    }

    public function deleteClassStudent($classStudentID){
        $this->emit('openDeleteConfirmMyclassModal');
        $this->emit('deleteClassStudentData',$classStudentID);
    }

    public function deleteClassStudentID($classStudentID){
        $Check_Student_Subject_Grade=ClassStudentSubjectGrade::where('class_student_id',$classStudentID)->where('class_id',$this->MyclassID)->get();
        foreach ($Check_Student_Subject_Grade as $check_student_subject_grade) {
            ClassStudentSubjectGrade::destroy($check_student_subject_grade['id']);
        }
        ClassStudent::destroy($classStudentID);
        $this->emit('closeDeleteConfirmModal');
        $this->emit('refresh_myclassform');
        $this->emit('alert_delete');
    }
    
    public function closeMyclassForm()
    {
        $this->emit('closeMyclassModal');
        $this->emit('refresh_my_class_table');
        $this->edit_data=0;
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function PrintStudentGrades($classStudentID)
    {
        date_default_timezone_set('Etc/GMT-8');
        $StudentID=ClassStudent::where('id',$classStudentID)->first();
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
            'StudentGrade' =>  ClassStudentSubjectGrade::where('class_student_id',$classStudentID)->where('class_id',$this->MyclassID)->get(),
        ])->setPaper('Letter', 'landscape')->output();
        return response()->streamDownload(fn () => print($pdfContent),$StudentInfo->lrn."_Grade.pdf");
        
    }
}
