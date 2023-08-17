<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Enroll Student</h3>
            <button type="button" class="close" wire:click="closeEnrollStudentForm" id="button-reset">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="card-body">
                        <div class="form-group">
                            <label for="student_id">Select Student</label>
                            <select class="form-control" id="student_id" wire:model="student_id" required>
                                <option>Select Student</option>
                                @foreach($Student_Data as $student_data)
                                    <option <?php
                                        foreach ($Taken_Student as $taken_student) {
                                            if($taken_student->student_id==$student_data->id){
                                                echo "disabled";
                                            }
                                        }
                                    ?> value="{{ $student_data->id }}">{{ $student_data->name }}<?php
                                        foreach ($Taken_Student as $taken_student) {
                                            if($taken_student->student_id==$student_data->id){
                                                echo " - already enrolled";
                                            }
                                        }
                                    ?></option>
                                @endforeach
                            </select>
                            @error('student_id') <span class="error" style="color: red">{{ $message }}</span> @enderror
                        </div>
            </div>
            <!-- /.card-body -->
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" wire:click="closeEnrollStudentForm">Close</button>
                @if(!empty($this->MyclassID))
                    <button type="submit" class="btn btn-primary">Save changes</button>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </div>
        </form>
    </div>
</div>