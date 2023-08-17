<?php

namespace App\Http\Livewire\AdminPanel\ManageUsers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentTable extends Component
{
    protected $listeners = [
        'refresh_student_table' => '$refresh',
        'delete',
        'closedelete'
    
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-users.student-table',[
            'Student_Data' => User::all()->where('rule_id',3)->whereNotIn('id',Auth::user()->id)
            ]);
    }

    public function createStudent(){
        $this->emit('openStudentModal');
    }

    public function editStudent($UserID){
        $this->emit('openStudentModal');
        $this->emit('editStudentData',$UserID);
    }

    public function deleteStudent($UserID){
        $this->emit('openDeleteConfirmStudentModal');
        $this->emit('deleteAllAroundData',$UserID);
    }

    public function delete($UserID){
        User::destroy($UserID);
        $this->emit('closeDeleteConfirmModal');
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
    public function closedelete(){
        $this->emit('closeDeleteConfirmModal');
        $this->emit('EmitTable');
    }
}
