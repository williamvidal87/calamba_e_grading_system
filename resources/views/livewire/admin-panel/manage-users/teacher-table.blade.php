<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Teacher</h1>
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
                            <button style="width: 9rem" type="button" class="btn btn-block bg-gradient-primary"  wire:click="createTeacher"><i class="fa fa-plus-circle"></i> Add Teacher</button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="TeacherTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th data-toggle="tooltip" data-placement="top" title="Teacher ID">Teacher ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Last Seen</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Teacher_Data as $data)
                                        <tr>
                                            <td>{{ 177001477+$data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td><td>
                                                @if(Cache::has('is_online' . $data->id))
                                                    <span class="text-success">Online</span>
                                                @else
                                                    <span class="text-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->last_seen != null)
                                                    {{ \Carbon\Carbon::parse($data->last_seen)->diffForHumans() }}
                                                @else
                                                    No data
                                                @endif
                                            </td>
                                            <td style="width: 9rem">
                                                <button  class="py-0 btn btn-sm btn-info" wire:click="editTeacher({{$data->id}})"><i class="fas fa-edit"></i>Edit</button> | 
                                                <button  class="py-0 btn btn-sm btn-danger" wire:click="deleteTeacher({{$data->id}})"><i class="fas fa-trash-alt"></i>Delete</button>
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
    <div wire.ignore.self class="modal fade" id="TeacherModal" role="dialog" aria-labelledby="TeacherModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <livewire:admin-panel.manage-users.teacher-form />
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
    @include('layouts.scripts.admin-teacher-table-scripts'); 
@endsection