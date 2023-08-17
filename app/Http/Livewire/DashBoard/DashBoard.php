<?php

namespace App\Http\Livewire\DashBoard;

use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class DashBoard extends Component
{
    public function render()
    {
        return view('livewire.dash-board.dash-board',[
            'Students' => User::where('rule_id',3)->get(),
            'Subjects' => Subject::all(),
            'Teachers' => User::where('rule_id',2)->get(),
            'Admin' => User::where('rule_id',1)->get(),
            ]);
    }
}
