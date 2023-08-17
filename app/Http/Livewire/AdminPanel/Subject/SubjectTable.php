<?php

namespace App\Http\Livewire\AdminPanel\Subject;

use App\Models\Subject;
use Livewire\Component;

class SubjectTable extends Component
{
    protected $listeners = [
        'refresh_subject_table' => '$refresh',
        'delete',
        'closedelete'
    
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.subject.subject-table',[
            'Subject_Data' => Subject::all()
            ]);
    }

    public function createSubject(){
        $this->emit('openSubjectModal');
    }

    public function editSubject($SubjectID){
        $this->emit('openSubjectModal');
        $this->emit('editSubjectData',$SubjectID);
    }

    public function deleteSubject($SubjectID){
        $this->emit('openDeleteConfirmSubjectModal');
        $this->emit('deleteAllAroundData',$SubjectID);
    }

    public function delete($SubjectID){
        Subject::destroy($SubjectID);
        $this->emit('closeDeleteConfirmModal');
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
    public function closedelete(){
        $this->emit('closeDeleteConfirmModal');
        $this->emit('EmitTable');
    }
}
