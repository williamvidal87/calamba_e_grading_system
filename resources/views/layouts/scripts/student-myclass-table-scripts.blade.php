
@push('student-myclass-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        
        $(function () {
                    $("#MyclassTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#MyclassTable_wrapper .col-md-6:eq(0)');
                
                
            });
                
        
    })
    
    window.livewire.on('openMyGradesModal', () => {
            $('#ViewMyGradesModal').modal('show');
    });
    
    
    
    window.livewire.on('closeMyGradesModal', () => {
            $('#ViewMyGradesModal').modal('hide');
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
    



    window.livewire.on('EmitTable', () => {
                    if ($.fn.DataTable.isDataTable("#MyclassTable")) {
                                $('#MyclassTable').DataTable().destroy();
                    }
                    $("#MyclassTable").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#MyclassTable_wrapper .col-md-6:eq(0)');
                
                
    });
</script>
@endpush