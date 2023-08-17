<?php

namespace App\Http\Livewire\AdminPanel\ManageUsers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherTable extends Component
{
    protected $listeners = [
        'refresh_teacher_table' => '$refresh',
        'delete',
        'closedelete'
    
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-users.teacher-table',[
            'Teacher_Data' => User::all()->where('rule_id',2)->whereNotIn('id',Auth::user()->id)
            ]);
    }

    public function createTeacher(){
        $this->emit('openTeacherModal');
    }

    public function editTeacher($UserID){
        $this->emit('openTeacherModal');
        $this->emit('editTeacherData',$UserID);
    }

    public function deleteTeacher($UserID){
        $this->emit('openDeleteConfirmTeacherModal');
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
