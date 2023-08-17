<?php

namespace App\Http\Livewire\AdminPanel\Subject;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubjectForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $subject_name;
    public  $SubjectID;
    public  $edit_data=0;
    
    protected $listeners = ['editSubjectData'];
    
    public function store()
    {
            $this->validate([
                'subject_name' => 'required',
            ]);
        
        $this->data = ([
            'subject_name'                      => $this->subject_name
        ]);

        try {
            if($this->SubjectID){
                Subject::find($this->SubjectID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                $show=Subject::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeSubjectModal');
        $this->emit('refresh_subject_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->edit_data=0;
    }

    public function editSubjectData($SubjectID)
    {
        $this->SubjectID=$SubjectID;
        $DATA=Subject::find($this->SubjectID);
        $this->subject_name = $DATA['subject_name'];
        $this->edit_data=1;
    
    }
    
    public function render()
    {
        return view('livewire.admin-panel.subject.subject-form');
    }
    
    
    public function closeSubjectForm(){
        $this->emit('closeSubjectModal');
        $this->emit('refresh_subject_table');
        $this->edit_data=0;
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
