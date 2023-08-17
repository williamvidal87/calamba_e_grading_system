
@push('teacher-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        
        $(function () {
                    $("#TeacherTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#TeacherTable_wrapper .col-md-6:eq(0)');
                
                
            });
                
        
    })
    
    window.livewire.on('openTeacherModal', () => {
            $('#TeacherModal').modal('show');
    });
    
    window.livewire.on('closeTeacherModal', () => {
            $('#TeacherModal').modal('hide');
            if ($.fn.DataTable.isDataTable("#TeacherTable")) {
                $('#TeacherTable').DataTable().destroy();
                }
                else{
                    $("#TeacherTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#TeacherTable_wrapper .col-md-6:eq(0)');
                }
                
    });

    window.livewire.on('openDeleteConfirmTeacherModal', () => {

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
                    if ($.fn.DataTable.isDataTable("#TeacherTable")) {
                                $('#TeacherTable').DataTable().destroy();
                    }
                    $("#TeacherTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#TeacherTable_wrapper .col-md-6:eq(0)');
                
                
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
            title: 'Teacher Successfully Save.'
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
            title: 'Teacher Successfully Updated.'
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
            title: 'Teacher Successfully Deleted.'
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