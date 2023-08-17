<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">My Class</h3>
            <button type="button" class="close" wire:click="closeMyclassForm" id="button-reset">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="grade_id">Select Grade</label>
                            <select class="form-control" id="grade_id" wire:model="grade_id" disabled>
                                <option>Select Grade</option>
                                @foreach($Grade_Data as $grade_data)
                                    <option value="{{ $grade_data->id }}">{{ $grade_data->grade_name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id') <span class="error" style="color: red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" class="form-control" id="section" wire:model="section" disabled>
                            @error('section') <span class="error" style="color: red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="school_year">School Year</label>
                            <input type="text" class="form-control" id="school_year" wire:model="school_year" disabled>
                            @error('school_year') <span class="error" style="color: red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <a href="javascript: void(0)"  class="py-0 btn btn-sm btn-primary" wire:click="enrollStudent"><i class="fas fa-user"></i> Enroll Student</a>
                        <a href="javascript: void(0)"  class="py-0 btn btn-sm btn-secondary" wire:click="classSubject"><i class="fas fa-book"></i> CLass Subject</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th><div style="float: right;margin-right:10em">Action</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ClassStudent_Data as $classstudent_data)
                                    <tr>
                                        <td>{{ $classstudent_data->getStudent->name }}</td>
                                        <td>
                                        <div style="float: right">
                                            <a href="javascript: void(0)"  class="py-0 btn btn-sm btn-warning" wire:click="PrintStudentGrades({{$classstudent_data->id}})"><i class="fas fa-save"></i> Print</a> |
                                            <a href="javascript: void(0)"  class="py-0 btn btn-sm btn-secondary" wire:click="ViewStudentGrades({{$classstudent_data->id}})"><i class="fas fa-eye"></i> View</a> |
                                            <a href="javascript: void(0)"  class="py-0 btn btn-sm btn-danger" wire:click="deleteClassStudent({{$classstudent_data->id}})"><i class="fas fa-trash-alt"></i> Delete</a>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card-body -->
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" wire:click="closeMyclassForm">Close</button>
            </div>
        </form>
    </div>
</div>