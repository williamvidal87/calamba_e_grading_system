<?php

namespace App\Http\Livewire\TeacherPanel\Myclass;

use App\Models\Grade;
use App\Models\Myclass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMyclassForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $grade_id,
            $section,
            $school_year;
    public  $MyclassID;
    public  $MyclassStudentID;
    public  $edit_data=0;
    
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
                $this->data['teacher_id']=Auth::user()->id;
                $show=Myclass::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeClassModal');
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
        return view('livewire.teacher-panel.myclass.create-myclass-form',[
            'Grade_Data' => Grade::all(),
            ]);
    }
    
    public function closeMyclassForm()
    {
        $this->emit('closeClassModal');
        $this->emit('refresh_my_class_table');
        $this->edit_data=0;
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
