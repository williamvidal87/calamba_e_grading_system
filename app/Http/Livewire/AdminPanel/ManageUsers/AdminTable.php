<?php

namespace App\Http\Livewire\AdminPanel\ManageUsers;

use App\Models\User;
use App\Models\UserActivityLogsDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminTable extends Component
{
    protected $listeners = [
        'refresh_admin_table' => '$refresh',
        'delete',
        'closedelete'
    
    ];
    
    public function render()
    {
        $this->emit('EmitTable');
        return view('livewire.admin-panel.manage-users.admin-table',[
            'Admin_Data' => User::all()->where('rule_id',1)->whereNotIn('id',Auth::user()->id)
            ]);
    }

    public function createAdmin(){
        $this->emit('openAdminModal');
    }

    public function editAdmin($UserID){
        $this->emit('openAdminModal');
        $this->emit('editAdminData',$UserID);
    }

    public function deleteAdmin($UserID){
        $this->emit('openDeleteConfirmAdminModal');
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
