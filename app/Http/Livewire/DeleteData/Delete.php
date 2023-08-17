<?php

namespace App\Http\Livewire\DeleteData;

use Livewire\Component;

class Delete extends Component
{
    
    public $ID;
    public $ClassStudentID;

    protected $listeners = [
    'deleteAllAroundData',
    'deleteClassStudentData'
    ];

    public function deleteAllAroundData($ID)
    {
        $this->ID=$ID;
    }
    
    public function deleteClassStudentData($ClassStudentID)
    {   
        $this->ClassStudentID=$ClassStudentID;
    }

    public function deleteData()
    {
        if ($this->ClassStudentID) {
            $this->emit('deleteClassStudentID',$this->ClassStudentID);
        }
        if ($this->ID) {
            $this->emit('delete',$this->ID);
        }
    }

    public function closeDeleteConfirmationModal(){
        
        $this->emit('closeDeleteConfirmModal');
        if ($this->ClassStudentID) {
        } else {
            $this->emit('refresh_my_class_table');
        }
    }



    public function render()
    {
        return view('livewire.delete-data.delete');
    }
}
