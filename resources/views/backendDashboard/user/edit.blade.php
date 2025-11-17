{{-- Page for adding new User's --}}
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUserForm" action="{{ route('user-update') }}" method="POST">
                    @csrf
                    <input type="number" name="id" id="userId" value="" hidden>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="userEmail" name="email" required>
                    </div>
                    <div class="mb-3" id="userPasswordSection">
                        <label for="userPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="userPassword" name="password" >
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-futuristic" form="editUserForm">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editUserModal = document.getElementById('editUserModal');
        editUserModal.addEventListener('show.bs.modal', function (event) {
        
            var button = event.relatedTarget;
            
            var userId = button.getAttribute('data-id');
            var userName = button.getAttribute('data-name');
            var userEmail = button.getAttribute('data-email');
            var isSuperAdmin = button.getAttribute('data-isSuperAdmin');

            var passwordField = document.getElementById('userPasswordSection');
            
            if (isSuperAdmin === "1") {
                passwordField.style.display = 'none';
            } else {
                passwordField.style.display = 'block';
            }

            var modal = this;
            modal.querySelector('#userName').value = userName;
            modal.querySelector('#userEmail').value = userEmail;
            modal.querySelector('#userId').value = userId;
        });
    });
</script>