<?php

namespace App\Http\Livewire\AdminPanel\ManageUsers;

use App\Models\Sex;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentForm extends Component
{
    use WithFileUploads;

    public  $data = [];
    public  $name,
            $email,
            $temp_email,
            $password,
            $newpassword,
            $confirmpassword,
            $rule_id,
            $lrn,
            $birth_date,
            $sex_id;
    public  $UserID;
    public  $edit_data=0;
    
    protected $listeners = ['editStudentData'];
    
    public function store()
    {
        if ($this->UserID) {
            if ($this->temp_email==$this->email) {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                    'lrn' => 'required',
                    'birth_date' => 'required',
                    'sex_id' => 'required',
                ]);
            } else {
                $this->validate([
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'newpassword' => 'same:confirmpassword',
                    'confirmpassword' => '',
                    'lrn' => 'required',
                    'birth_date' => 'required',
                    'sex_id' => 'required',
                ]);
            }
        } else {
        
            $this->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|same:confirmpassword',
                'confirmpassword' => 'required',
                'lrn' => 'required',
                'birth_date' => 'required',
                'sex_id' => 'required',
            ]);
        }
        
        $this->data = ([
            'name'                      => $this->name,
            'email'                     => $this->email,
            'lrn'                       => $this->lrn,
            'birth_date'                => $this->birth_date,
            'sex_id'                    => $this->sex_id
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
                $this->data['rule_id']=3;
                $show=User::create($this->data);
                $this->emit('alert_store');
                
            }
            
        } catch (\Exception $e) {
			dd($e);
			return back();
        }

        $this->emit('closeStudentModal');
        $this->emit('refresh_student_table');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
        $this->edit_data=0;
    }

    public function editStudentData($UserID)
    {
        $this->UserID=$UserID;
        $DATA=User::find($this->UserID);
        $this->name = $DATA['name'];
        $this->email = $DATA['email'];
        $this->temp_email = $DATA['email'];
        $this->lrn = $DATA['lrn'];
        $this->birth_date = $DATA['birth_date'];
        $this->sex_id = $DATA['sex_id'];
        $this->edit_data=1;

    }

    public function render()
    {
        return view('livewire.admin-panel.manage-users.student-form',[
            'Sex_Data'  =>  Sex::all(),
        ]);
    }
    
    
    public function closeStudentForm(){
        $this->emit('closeStudentModal');
        $this->emit('refresh_student_table');
        $this->edit_data=0;
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
