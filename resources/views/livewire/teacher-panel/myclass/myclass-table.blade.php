<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>My Class</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <br>
                        <div style="margin-left: 1rem">
                            <button style="width: 9rem" type="button" class="btn btn-block bg-gradient-primary"  wire:click="createClass"><i class="fa fa-plus-circle"></i> Add Class</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="MyclassTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-toggle="tooltip" data-placement="top" title="Myclass ID">Class ID</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>School Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Myclass_Data as $data)
                                        <tr>
                                            <td>{{ 29100+$data->id }}</td>
                                            <td>{{ $data->getGrade->grade_name }}</td>
                                            <td>{{ $data->section }}</td>
                                            <td>{{ $data->school_year }}</td>
                                            <td style="width: 9rem">
                                                <button  class="py-0 btn btn-sm btn-secondary" wire:click="editMyclass({{$data->id}})"><i class="fas fa-eye"></i>View</button> | 
                                                <button  class="py-0 btn btn-sm btn-danger" wire:click="deleteMyclass({{$data->id}})"><i class="fas fa-trash-alt"></i>Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    
    
        <!-- Create edit MODAL -->
        <div wire.ignore.self class="modal fade" id="ClassModal" role="dialog" aria-labelledby="ClassModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <livewire:teacher-panel.myclass.create-myclass-form />
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    
        <!-- View MODAL -->
    <div wire.ignore.self class="modal fade" id="MyclassModal" role="dialog" aria-labelledby="MyclassModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <livewire:teacher-panel.myclass.myclass-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <div wire.ignore.self class="modal fade" id="EnrollStudentModal" role="dialog" aria-labelledby="EnrollStudentModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <div class="modal-content">
                <livewire:teacher-panel.myclass.enroll-student-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- Delete Confirm Modal -->
    <div wire.ignore.self id="delete_data" class="modal fade" role="dialog" aria-labelledby="delete_data" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-confirm">
            <livewire:delete-data.delete />
        </div>
    </div>
    
    
    <!-- Class Subject MODAL -->
    <div wire.ignore.self class="modal fade" id="ClassSubjectModal" role="dialog" aria-labelledby="ClassSubjectModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-md" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <div class="modal-content">
                <livewire:teacher-panel.myclass.class-subject-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    <!-- Class Subject MODAL -->
    <div wire.ignore.self class="modal fade" id="StudentGradesModal" role="dialog" aria-labelledby="StudentGradesModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <div class="modal-content">
                <livewire:teacher-panel.myclass.class-student-subject-grade-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
@section('custom_script')
    @include('layouts.scripts.teacher-myclass-table-scripts'); 
@endsection