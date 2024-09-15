 <div class="modal-header">
    <h5 class="modal-title" id="createModaLabel">Add User</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<form id="createForm" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <input type="hidden" name="id" id="id" value="{{ @$user_id }}">
        
        <div class="form-group">
            <label for="createName">Name</label>
            <input type="text" class="form-control" id="createName" name="name" value="{{ @$user }}" placeholder="Enter user name" >
        </div>

        <div class="form-group">
            <label for="createEmail">Email</label>
            <input type="email" class="form-control" id="createEmail" name="email" value="{{ @$userEmail}}" placeholder="Enter user email">
        </div>

        <!-- <div class="form-group">
            <label for="createPassword" id="passwordlabel">password</label>
            <input type="password" class="form-control" id="createPassword" name="password"  placeholder="Enter user password">
        </div> -->
        <!-- <div class="form-group">
            <label for="createis">Role</label>
            <input type="text" class="form-control" id="createAddress" name="role_id" value="{{ @$prevPost->role_id }}" placeholder="Enter user role">
        </div> -->
         <div class="form-group">
            <label for="roleName">Role</label>
            <input type="text" class="form-control" id="roleName" name="roleName" value="{{ @$roleName }}" readonly>
            <input type="hidden" id="roleId" name="role"id="roleId" value="{{ @$role_id }}">
        </div> 


        
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
    </div>
</form>  




<script>
$(document).ready(function(){
    $('#createForm').on('submit', function(e) {
        e.preventDefault();
        var table = $('#utkarshTable').DataTable();
        var formData = new FormData(this);

        $.ajax({
            url: "{{ route('registration.post') }}",
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function() {
                table.ajax.reload();
                resetFormExceptRole();
                $('#id').val('');
                $('#createModa').modal('hide');
            },
            error: function(xhr) {
                // Improved error handling
                try {
                    var errors = JSON.parse(xhr.responseText);
                    var errorMsg = 'An error occurred: ';
                    $.each(errors.errors, function(key, value) {
                        errorMsg += value + ' ';
                    });
                    alert(errorMsg);
                } catch (e) {
                    alert('An error occurred: ' + xhr.responseText);
                    console.error(xhr.responseText);
                }
            }
        });
    });


});




</script>
