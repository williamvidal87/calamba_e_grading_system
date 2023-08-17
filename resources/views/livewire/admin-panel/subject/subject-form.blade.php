<div>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Subject</h3>
            <button type="button" class="close" wire:click="closeSubjectForm" id="button-reset">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="subject_name">Subject Name</label>
                    <input type="text" class="form-control" id="subject_name" wire:model="subject_name">
                    @error('subject_name') <span class="error" style="color: red">{{ $message }}</span> @enderror
                </div>
            </div>
            <!-- /.card-body -->
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" wire:click="closeSubjectForm">Close</button>
                @if(!empty($this->SubjectID))
                    <button type="submit" class="btn btn-primary">Save changes</button>
                @else
                    <button type="submit" class="btn btn-primary">Submit</button>
                @endif
            </div>
        </form>
    </div>
</div>