<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Subject</h1>
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
                            <button style="width: 9rem" type="button" class="btn btn-block bg-gradient-primary"  wire:click="createSubject"><i class="fa fa-plus-circle"></i> Add Subject</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="SubjectTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-toggle="tooltip" data-placement="top" title="Subject ID">Subject ID</th>
                                        <th>Subject Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Subject_Data as $data)
                                        <tr>
                                            <td>{{ 200+$data->id }}</td>
                                            <td>{{ $data->subject_name }}</td>
                                            <td style="width: 9rem">
                                                <button  class="py-0 btn btn-sm btn-info" wire:click="editSubject({{$data->id}})"><i class="fas fa-edit"></i>Edit</button> | 
                                                <button  class="py-0 btn btn-sm btn-danger" wire:click="deleteSubject({{$data->id}})"><i class="fas fa-trash-alt"></i>Delete</button>
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
    
    
        <!-- CREATE EDIT MODAL -->
    <div wire.ignore.self class="modal fade" id="SubjectModal" role="dialog" aria-labelledby="SubjectModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:admin-panel.subject.subject-form />
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

</div>
@section('custom_script')
    @include('layouts.scripts.admin-subject-table-scripts'); 
@endsection