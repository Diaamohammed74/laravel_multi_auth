@extends('back.master')
@section('title', 'Back | Admins')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h2 class="h5 page-title">Admins</h2>
            <div class="page-title-right">
                <a href="{{ route('back.admins.create') }}" class="btn btn-primary">
                    Add New 
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3" id="mainCont">
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
                    @if (count($admins)>0)
                    @forelse ($admins as $admin)
                    <td>
                        {{$admin->name}}
                    </td>
                    <td>
                        {{$admin->email}}
                    </td>
                    @if (count($admin->getRoleNames())>0)
                    <td>
                        <span class="badge bg-label-primary me-1">
                            {{ $admin->getRoleNames()[0] }}
                        </span>
                    </td>
                    @else
                    <td>
                        <span class="badge bg-label-primary me-1">
                            No Roles Assigned
                        </span>
                    </td>
                    @endif
                </tr>
                    @empty
                        <td>Empty</td>
                    @endforelse
                    <tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
