{{-- Page for adding new User's --}}
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPermissionModalLabel">Edit Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPermissionForm" action="{{ route('permission-update') }}" method="POST">
                    @csrf
                    <input type="number" name="id" id="permissionId" value="" hidden>
                    <div class="mb-3">
                        <label for="permissionName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="permissionName" name="name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-futuristic" form="editPermissionForm">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var editUserModal = document.getElementById('editPermissionModal');
        editUserModal.addEventListener('show.bs.modal', function (event) {
        
            var button = event.relatedTarget;
            
            var userId = button.getAttribute('data-id');
            var userName = button.getAttribute('data-name');

            var modal = this;
            modal.querySelector('#permissionName').value = userName;
            modal.querySelector('#permissionId').value = userId;
        });
    });
</script>