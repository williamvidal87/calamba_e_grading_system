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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="MyclassTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-toggle="tooltip" data-placement="top" title="Myclass ID">Class ID</th>
                                        <th>Teacher</th>
                                        <th>Grade</th>
                                        <th>Section</th>
                                        <th>School Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Myclass_Data as $data)
                                    @foreach($Student_Data as $student_data)
                                        @if($data->id==$student_data->class_id&&$student_data->student_id==Auth::user()->id)
                                        <tr>
                                            <td>{{ 29100+$data->id }}</td>
                                            <td>{{ $data->getTeacher->name }}</td>
                                            <td>{{ $data->getGrade->grade_name }}</td>
                                            <td>{{ $data->section }}</td>
                                            <td>{{ $data->school_year }}</td>
                                            <td style="width: 9rem">
                                                <button  class="py-0 btn btn-sm btn-secondary" wire:click="ViewMyGradesModal({{$data->id}},{{ $student_data->id }})"><i class="fas fa-eye"></i> View Grades</button>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
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
    
    
    <!-- Class Subject MODAL -->
    <div wire.ignore.self class="modal fade" id="ViewMyGradesModal" role="dialog" aria-labelledby="ViewMyGradesModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-xl" style="box-shadow: 0 0 500px 500px rgb(22, 22, 22, 0.185)">
            <div class="modal-content">
                <livewire:student-panel.my-class.my-grade-form />
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
@section('custom_script')
    @include('layouts.scripts.student-myclass-table-scripts'); 
@endsection