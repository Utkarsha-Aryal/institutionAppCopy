@extends('backend.layout.main')

@section('main-content')
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
{{-- data table --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.4.min.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Add User</title>
</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-primary" id="add_add" data-bs-toggle="modal" data-bs-target="#createModa">
            Add
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createModa" tabindex="-1" aria-labelledby="createModaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    
                </div>
            </div>
        </div>
    

    
    <table id="utkarshTable" class="display table table-striped">
        <thead>
            <tr>
             
                <th>Name</th>
                <th>Email</th>
                <th>role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    
    <div class="modal fade" id="createModa" tabindex="-1" role="dialog" aria-labelledby="createModaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              
            </div>
        </div>
    </div>


</div>
@endsection


@section('script')

    <script>
        $(document).ready(function() {


            
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            var table = $('#utkarshTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.data') }}",
                columns: [
                   
                    { data: 'name',orderable:false },
                    { data: 'email',orderable:false },
                    { data: 'role_id',orderable:false },
                    //  { data: 'role_id',orderable:false },
                    { data: 'action' ,orderable:false}
                ]
            });
       
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            
            $('.btn-primary').on('click', function(e) {
            e.preventDefault();
            var url = '{{ route('admin.form') }}';
                $.get(url, function(response) {
                    $('#createModa .modal-content').html(response);
                    $('#createModa').modal('show');
                });
            });

          

          
            $(document).on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            var url = '{{ route("admin.form") }}';
            var data = {
                id: id
            };

            $.ajax({
                url: url,
                type: 'get',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                   
                    $('#createModa .modal-content').html(response);
                    $('#createModa').modal('show');
                    $('#createPassword').hide();
                    $('#passwordlabel').hide();
                    $('#createModa').modal('hide');
                      
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred:', status, error);
                }
            });
        });

        $('#utkarshTable').on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
              
                    $.ajax({
                        url: "{{ route('admin.delete') }}",
                        type: 'POST',
                        headers: { 'X-CSRF-TOKEN': csrfToken },
                        data: { id: id },
                        success: function(response) {
                            if (response.type === 'success') {
                               
                                table.ajax.reload(); 
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr) {
                            alert('An error occurred while processing your request.');
                            console.log(xhr.responseText);
                        }
                    });
                
            });

})
      
    </script>
</body>
</html>

      
@endsection
