<?php

namespace App\Http\Livewire\TeacherPanel\Myclass;

use App\Models\Myclass;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyclassTable extends Component
{
    protected $listeners = [
        'refresh_my_class_table' => '$refresh',
        'delete',
        'closedelete'
    
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.teacher-panel.myclass.myclass-table',[
            'Myclass_Data' => Myclass::where("teacher_id",Auth::user()->id)->get()
            ])->with('getGrade');
    }

    public function createMyclass(){
        $this->emit('openMyclassModal');
    }
    
    public function createClass(){
        $this->emit('openClassModal');
    }

    public function editMyclass($MyclassID){
        $this->emit('openMyclassModal');
        $this->emit('editMyclassData',$MyclassID);
    }

    public function deleteMyclass($MyclassID){
        $this->emit('openDeleteConfirmMyclassModal');
        $this->emit('deleteAllAroundData',$MyclassID);
    }

    public function delete($MyclassID){
        Myclass::destroy($MyclassID);
        $this->emit('closeDeleteConfirmModal');
        $this->emit('EmitTable');
        $this->emit('alert_delete');
    }
    public function closedelete(){
        $this->emit('closeDeleteConfirmModal');
        $this->emit('EmitTable');
    }
}
