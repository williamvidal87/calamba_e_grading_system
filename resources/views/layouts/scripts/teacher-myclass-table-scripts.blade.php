
@push('myclass-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        window.initStudent_idDrop = () => {
            $('#student_id').select2({
                dropdownParent: $("#EnrollStudentModal"),
                placeholder: 'Select a Student',
                allowClear: false,
                closeOnSelect: true,
                theme: 'bootstrap4'

            });
        }

        initStudent_idDrop();
        $('#student_id').on('change', function(e) {
            livewire.emit('selectedStudent', e.target.value)
        });
        
        window.livewire.on('select2', () => {
            initStudent_idDrop();
        });
        
        $(function () {
                    $("#MyclassTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#MyclassTable_wrapper .col-md-6:eq(0)');
                
                
            });
                
        
    })
    
    window.livewire.on('openMyclassModal', () => {
            $('#MyclassModal').modal('show');
    });
    
    window.livewire.on('openClassModal', () => {
            $('#ClassModal').modal('show');
    });
    
    window.livewire.on('openEnrollStudentModal', () => {
            $('#EnrollStudentModal').modal('show');
    });
    
    window.livewire.on('openClassSubjectModal', () => {
            $('#ClassSubjectModal').modal('show');
    });
    
    window.livewire.on('openStudentGradesModal', () => {
            $('#StudentGradesModal').modal('show');
    });
    
    window.livewire.on('closeClassModal', () => {
            $('#ClassModal').modal('hide');
            if ($.fn.DataTable.isDataTable("#MyclassTable")) {
                $('#MyclassTable').DataTable().destroy();
                }
                else{
                    $("#MyclassTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#MyclassTable_wrapper .col-md-6:eq(0)');
                }
                
    });
    
    window.livewire.on('closeMyclassModal', () => {
            $('#MyclassModal').modal('hide');
            if ($.fn.DataTable.isDataTable("#MyclassTable")) {
                $('#MyclassTable').DataTable().destroy();
                }
                else{
                    $("#MyclassTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#MyclassTable_wrapper .col-md-6:eq(0)');
                }
                
    });
    
    window.livewire.on('closeEnrollStudentModal', () => {
            $('#EnrollStudentModal').modal('hide');
    });
    
    window.livewire.on('closeClassSubjectModal', () => {
            $('#ClassSubjectModal').modal('hide');
    });
    
    window.livewire.on('closeStudentSubectGradeModal', () => {
            $('#StudentGradesModal').modal('hide');
    });
    

    window.livewire.on('openDeleteConfirmMyclassModal', () => {

            $('#delete_data').modal('show');
    });

    window.livewire.on('closeDeleteConfirmModal', () => {

            $('#delete_data').modal('hide');
    });

    window.livewire.on('openCancelConfirmModal', () => {

            $('#cancel_data').modal('show');
    });

    window.livewire.on('closeCancelConfirmModal', () => {

            $('#cancel_data').modal('hide');
    });


    window.livewire.on('EmitTable', () => {
                    if ($.fn.DataTable.isDataTable("#MyclassTable")) {
                                $('#MyclassTable').DataTable().destroy();
                    }
                    $("#MyclassTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#MyclassTable_wrapper .col-md-6:eq(0)');
                
                
    });

    // for store alert
    window.livewire.on('alert_store', () => {
        $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });
            Toast.fire({
            icon: 'success',
            title: 'Successfully Save.'
            })
        });
    });
    // for update alert
    window.livewire.on('alert_update', () => {
        $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });
            Toast.fire({
            icon: 'info',
            title: 'Successfully Updated.'
            })
        });
    });
    // for delete alert
    window.livewire.on('alert_delete', () => {
        $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });
            Toast.fire({
            icon: 'error',
            title: 'Successfully Deleted.'
            })
        });
    });
    // for warning alert
    window.livewire.on('alert_warning', () => {
        $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 6000
        });
            Toast.fire({
            icon: 'warning',
            title: 'You are not allowed to update this record right now.'
            })
        });
    });
</script>
@endpush