<?php

namespace App\Http\Livewire\AdminPanel\ManageUsers;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $name,
            $email,
            $temp_email,
            $password,
            $newpassword,
            $confirmpassword,
            $rule_id;
    public  $UserID;
    public  $edit_data=0;
    
    protected $listeners = ['editTeacherData'];
    
    public function store()
    {
        if ($this->UserID) {
            if ($this->temp_email==$this->email) {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                ]);
            } else {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                ]);
            }
        } else {
        
            $this->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|same:confirmpassword',
                'confirmpassword' => 'required',
            ]);
        }
        
        $this->data = ([
            'name'                      => $this->name,
            'email'                     => $this->email
        ]);

        try {
            if($this->UserID){
                if ($this->newpassword) {
                    $this->data['password']=bcrypt($this->newpassword);
                }
                User::find($this->UserID)->update($this->data);
                $this->emit('alert_update');
                
            }else{
                
                $this->data['password']=bcrypt($this->password);
                $this->data['rule_id']=2;
                $show=User::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeTeacherModal');
        $this->emit('refresh_teacher_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->edit_data=0;
    }

    public function editTeacherData($UserID)
    {
        $this->UserID=$UserID;
        $DATA=User::find($this->UserID);
        $this->name = $DATA['name'];
        $this->email = $DATA['email'];
        $this->temp_email = $DATA['email'];
        $this->edit_data=1;
    
    }
    
    public function render()
    {
        return view('livewire.admin-panel.manage-users.teacher-form');
    }
    
    
    public function closeTeacherForm(){
        $this->emit('closeTeacherModal');
        $this->emit('refresh_teacher_table');
        $this->edit_data=0;
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
