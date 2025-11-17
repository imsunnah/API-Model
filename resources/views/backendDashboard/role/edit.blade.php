{{-- Page for adding new User's --}}
<div class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoleModalLabel">Edit Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editRoleForm" action="{{ route('role-update') }}" method="POST">
                    @csrf
                    <input type="number" name="id" id="roleId" value="" hidden>
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="roleName" name="name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-futuristic" form="editRoleForm">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editUserModal = document.getElementById('editRoleModal');
        editUserModal.addEventListener('show.bs.modal', function (event) {
        
            var button = event.relatedTarget;
            
            var userId = button.getAttribute('data-id');
            var userName = button.getAttribute('data-name');

            var modal = this;
            modal.querySelector('#roleName').value = userName;
            modal.querySelector('#roleId').value = userId;
        });
    });
</script>