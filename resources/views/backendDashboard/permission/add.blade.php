{{-- Page for adding new Permission's --}}
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPermissionModalLabel">Add New Permission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPermissionForm" action="{{ route('new-permission-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="permissionName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="permissionName" name="name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-futuristic" form="addPermissionForm">Save</button>
            </div>
        </div>
    </div>
</div>