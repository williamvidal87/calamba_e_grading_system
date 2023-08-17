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
                <div class="form-group">
                    <label for="grade_id">Select Grade</label>
                    <select class="form-control" id="grade_id" wire:model="grade_id">
                        <option>Select Grade</option>
                        @foreach($Grade_Data as $grade_data)
                            <option value="{{ $grade_data->id }}">{{ $grade_data->grade_name }}</option>
                        @endforeach
                    </select>
                    @error('grade_id') <span class="error" style="color: red">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="section">Section</label>
                    <input type="text" class="form-control" id="section" wire:model="section">
                    @error('section') <span class="error" style="color: red">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="school_year">School Year</label>
                    <input type="text" class="form-control" id="school_year" wire:model="school_year">
                    @error('school_year') <span class="error" style="color: red">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- /.card-body -->
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" wire:click="closeMyclassForm">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>