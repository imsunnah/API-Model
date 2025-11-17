
@extends('backendDashboard.index')
@section('main-content')
{{-- @if($permissions){{ var_dump($permissions) }}@endif --}}
<div class="container">
    <h2 class="mb-4 text-center header-section">Permissions</h2>
    <button class="btn btn-futuristic mb-3" data-bs-toggle="modal" data-bs-target="#addPermissionModal">Add New Permissions</button>
    <table class="futuristic-table w-100">
        <thead>
            <tr>
                <th>SL</th>
                <th>Permission Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $key=>$permission)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        {{-- <button class="btn btn-futuristic" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button> --}}
                        <div class="d-flex">
                            <button class="btn btn-futuristic m-1" data-bs-toggle="modal" data-bs-target="#editPermissionModal"
                                data-id="{{ $permission->id }}"
                                data-name="{{ $permission->name }}">Edit</button>
                            
                                {{-- <form action="{{ url('delete-user/'.$user->id) }}" class="m-1"> --}}
                                <form action="{{ url('delete-permission/'.$permission->id) }}" class="m-1">
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

@include('backendDashboard.permission.add')
@include('backendDashboard.permission.edit')
@endSection