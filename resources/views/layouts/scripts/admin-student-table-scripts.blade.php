
@push('student-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        
        $(function () {
                    $("#StudentTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#StudentTable_wrapper .col-md-6:eq(0)');
                
                
            });
                
        
    })
    
    window.livewire.on('openStudentModal', () => {
            $('#StudentModal').modal('show');
    });
    
    window.livewire.on('closeStudentModal', () => {
            $('#StudentModal').modal('hide');
            if ($.fn.DataTable.isDataTable("#StudentTable")) {
                $('#StudentTable').DataTable().destroy();
                }
                else{
                    $("#StudentTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#StudentTable_wrapper .col-md-6:eq(0)');
                }
                
    });

    window.livewire.on('openDeleteConfirmStudentModal', () => {

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
                    if ($.fn.DataTable.isDataTable("#StudentTable")) {
                                $('#StudentTable').DataTable().destroy();
                    }
                    $("#StudentTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#StudentTable_wrapper .col-md-6:eq(0)');
                
                
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
            title: 'Student Successfully Save.'
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
            title: 'Student Successfully Updated.'
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
            title: 'Student Successfully Deleted.'
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