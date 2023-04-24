@extends('back.master')
@section('title', 'Back | Admins')
@section('content')
    <h4>Admins</h4>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Admin</th>
                        <th>Email</th>
                        <th>Roles</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>
                            Email
                        </td>
                        <td><span class="badge bg-label-primary me-1">Role</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
