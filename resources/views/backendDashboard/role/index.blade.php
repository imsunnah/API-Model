
@extends('backendDashboard.index')
@section('main-content')
{{-- @if($permissions){{ var_dump($permissions) }}@endif --}}
<div class="container">
    <h2 class="mb-4 text-center header-section">Roles</h2>
    <button class="btn btn-futuristic mb-3" data-bs-toggle="modal" data-bs-target="#addRoleModal">Add New Role</button>
    <table class="futuristic-table w-100">
        <thead>
            <tr>
                <th>SL</th>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $key=>$role)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        {{-- <button class="btn btn-futuristic" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button> --}}
                        <div class="d-flex">
                            <button class="btn btn-futuristic m-1" data-bs-toggle="modal" data-bs-target="#editRoleModal"
                                data-id="{{ $role->id }}"
                                data-name="{{ $role->name }}">Edit</button>
                            
                                {{-- <form action="{{ url('delete-user/'.$user->id) }}" class="m-1"> --}}
                                <form action="{{ url('delete-role/'.$role->id) }}" class="m-1">
                                    @csrf
                                    <button type="submit" class="btn btn-futuristic-danger">Delete</button>
                                </form>
                            
                        </div>
                            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('backendDashboard.role.add')
@include('backendDashboard.role.edit')
@endSection