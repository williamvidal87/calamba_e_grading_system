<?php

namespace App\Http\Livewire\TeacherPanel\Myclass;

use App\Models\ClassStudentSubjectGrade;
use App\Models\ClassSubject;
use App\Models\Myclass;
use App\Models\Subject;
use Livewire\Component;

class ClassSubjectForm extends Component
{
    public  $MyclassID;
    public  $orderProducts = [];
    public  $subject_id = [];
    public  $count = 0;
    public  $count2 = 0;
    
    protected $listeners = [
        'addClassSubject'
        ];
        
    public function addProduct()
    {
        $this->orderProducts[] = ['class_subject_id'=>'','subject_id'=>'','class_id' => ''];
        
    }
    
    public function removeProduct($index)
    {   
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }
    
    public function render()
    {
        return view('livewire.teacher-panel.myclass.class-subject-form',[
            
            'select_items' => Subject::orderBy('subject_name', 'ASC')->get(),
        ]);
    }
    
    public function addClassSubject($MyclassID)
    {
        $this->MyclassID=$MyclassID;
        for ($i=count($this->orderProducts); $i >=0 ; $i--) {
            unset($this->orderProducts[$i]);
            $this->orderProducts = array_values($this->orderProducts);
        }
        $tools = ClassSubject::all()->where('class_id', $this->MyclassID);
        $this->count=0;
        foreach ($tools as $tool){
            $this->orderProducts[$this->count] = ['class_subject_id'=>$tool->id,'class_id'=>$tool->class_id,'subject_id' => $tool->subject_id];
            $this->count++;
        }
    }
    
    public function closeClassSubjectForm()
    {
        $this->emit('closeClassSubjectModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
    
    
    public function store()
    {

        try {
            if($this->MyclassID){
                $search_sample=ClassSubject::where('class_id',$this->MyclassID)->get();
                $this->count=0;
                // for empty items
                if(count($this->orderProducts)==0){
                    foreach ($search_sample as $search_samp2){
                        $Check_Student_Subject_Grade=ClassStudentSubjectGrade::where('class_subject_id',$search_samp2['id'])->where('class_id',$this->MyclassID)->get();
                        foreach ($Check_Student_Subject_Grade as $check_student_subject_grade) {
                            ClassStudentSubjectGrade::destroy($check_student_subject_grade['id']);
                        }
                        ClassSubject::destroy($search_samp2['id']);
                    }
                }
                foreach ($search_sample as $search_samp){
                    $search[$this->count]=$search_samp;
                    
                $this->count2=0;
                foreach ($this->orderProducts as $key4) {
                    if($key4['class_subject_id']=="")
                    {
                    }else{
                        if($search[$this->count]['id']==$key4['class_subject_id']){
                        }else{
                            $this->count2++;
                            if($this->count2==count($this->orderProducts)){
                                $Check_Student_Subject_Grade=ClassStudentSubjectGrade::where('class_subject_id',$search[$this->count]['id'])->where('class_id',$this->MyclassID)->get();
                                foreach ($Check_Student_Subject_Grade as $check_student_subject_grade) {
                                    ClassStudentSubjectGrade::destroy($check_student_subject_grade['id']);
                                }
                                ClassSubject::destroy($search[$this->count]['id']);
                            }
                        }
                    }
                }
                    $this->count++;
                }
                $this->count=0;
                foreach ($this->orderProducts as $key3) {
                    if($key3['class_subject_id']=="")
                    {
                        ClassSubject::create(['class_id' => $this->MyclassID,'subject_id' => $key3['subject_id']]);
                    }else{
                        ClassSubject::find($this->orderProducts[$this->count]['class_subject_id'])->update($this->orderProducts[$this->count]);
                        $this->count++;
                    }
                }
                $this->emit('alert_update');
            }else{
            
            }
        } catch (\Exception $e) {
			dd($e);
			return back();
        }
        
        $this->emit('closeClassSubjectModal');
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
