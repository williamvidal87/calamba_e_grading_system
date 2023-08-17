<?php

namespace App\Http\Livewire\TeacherPanel\Myclass;

use App\Models\ClassStudent;
use App\Models\User;
use Livewire\Component;

class EnrollStudentForm extends Component
{
    public $student_id;
    public $data;
    public $class_id;
    
    protected $listeners = [
    'selectedStudent',
    'EnrollStudent'
    ];
    
    public function selectedStudent($id){
        if($id){
            $this->student_id = $id;
        }else{
            $this->student_id = null;
        }
    }
    
    public function EnrollStudent($class_id)
    {
        $this->class_id=$class_id;
    }
    
    public function render()
    {
        return view('livewire.teacher-panel.myclass.enroll-student-form',[
            'Student_Data' => User::where('rule_id',3)->get(),
            'Taken_Student' => ClassStudent::where('class_id',$this->class_id)->get()
            ]);
    }
    
    public function hydrate(){
        $this->emit('select2');
    }
    
    public function store()
    {
        $this->validate([
            'student_id'      => 'required',
        ]);
        
        $this->data = ([
            'class_id'                      => $this->class_id,
            'student_id'                    => $this->student_id,
        ]); 
        
        try {
            if($this->student_id){
                $show=ClassStudent::create($this->data);
                $this->emit('alert_store');
            }else{
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeEnrollStudentModal');
        $this->emit('refresh_myclassform');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    public function closeEnrollStudentForm()
    {
        $this->emit('closeEnrollStudentModal');
        $this->emit('refresh_myclassform');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
