@extends('back.master')
@section('title', 'Back | Roles')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h2 class="h4 page-title">Roles</h2>
            {{-- @if(permission('add_role')) --}}
            <div class="page-title-right">
                <a href="{{ route('back.roles.create') }}" class="btn btn-primary">
                    Add New
                </a>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
<div class="card mt-3" id="mainCont">
    @include('layouts.messages')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('back.roles.edit', $role->id) }}">
                                <button type="button" class="btn btn-warning">Edit</button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('back.roles.delete', $role->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No roles found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
