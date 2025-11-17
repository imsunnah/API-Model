{{-- Page for adding new Role's --}}
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addRoleForm" action="{{ route('new-role-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="roleName" name="name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-futuristic" form="addRoleForm">Save</button>
            </div>
        </div>
    </div>
</div>