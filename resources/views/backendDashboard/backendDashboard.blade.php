
@extends('backendDashboard.index')
@section('main-content')

    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="{{ route('role-permission-list') }}">
                        <h5 class="card-title">Manage Roles & Permissions (Per user)</h5>
                        <p class="card-description">Here you can manage roles and permissions for each users.</p>
                    </a>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="{{ route('user-list') }}">
                        <h5 class="card-title">Our Users</h5>
                        <p class="card-description">Here you can see all the users associated with the application.</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="{{ route('role-list') }}">
                        <h5 class="card-title">Roles</h5>
                        <p class="card-description">Here you can see all the roles associated with the application.</p>
                    </a>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="{{ route('permission-list') }}">
                        <h5 class="card-title">Permissions</h5>
                        <p class="card-description">Here you can see all the permissions associated with the application.</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="card">
                    <a href="{{ route('telescope') }}">
                        <h5 class="card-title">Telescope</h5>
                        <p class="card-description">Access all Metrices of your Backend.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endSection