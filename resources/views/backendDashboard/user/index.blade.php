
@extends('backendDashboard.index')
@section('main-content')

<div class="container">
    <h2 class="mb-4 text-center header-section">Users</h2>
    <button class="btn btn-futuristic mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
    <table class="futuristic-table w-100">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $key=>$user)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if(!empty($user->roles))
                        @foreach($user->roles as $sl=>$role)
                            @if($sl > 0)
                                ,
                            @endif
                            {{$role->name}}
                        @endforeach
                    @endif
                    </td>
                    <td>
                        {{-- <button class="btn btn-futuristic" data-bs-toggle="modal" data-bs-target="#editUserModal">Edit</button> --}}
                        <div class="d-flex">
                            <button class="btn btn-futuristic m-1" data-bs-toggle="modal" data-bs-target="#editUserModal"
                                data-id="{{ $user->id }}"
                                data-name="{{ $user->name }}"
                                data-email="{{ $user->email }}"
                                data-roles="{{ $user->roles->pluck('name')->implode(', ') }}"
                                data-isSuperAdmin="@if($user->roles->contains('name', 'Super Admin')){{1}}@else{{0}}@endif">Edit</button>
                            @if(!$user->roles->contains('name', 'Super Admin'))
                                <form action="{{ url('delete-user/'.$user->id) }}" class="m-1">
                                    @csrf
                                    <button type="submit" class="btn btn-futuristic-danger">Delete</button>
                                </form>
                            @endif
                        </div>
                            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('backendDashboard.user.add')
@include('backendDashboard.user.edit')
@endSection