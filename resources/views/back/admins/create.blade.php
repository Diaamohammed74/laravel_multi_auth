@extends('back.master')
@section('title', 'Back | Admins')
@section('content')

    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Add New Admin</h2>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('back.admins.store') }}" method="post" id="add_form" enctype="multipart/form-data">
                @csrf
                <div id="add_form_messages"></div>
                {{-- MODIFICATIONS FROM HERE --}}
                <div class="row">
                    <div class="form-group col-md-10">
                        <label class="form-label">Name</label>
                        <input type="text" class="border form-control" name="name"
                            placeholder="please enter role name">
                    </div>
                    <div class="form-group col-md-10">
                        <label class="form-label">Email</label>
                        <input type="email" class="border form-control" name="email"
                            placeholder="please enter role name">
                    </div>
                    <div class="form-group col-md-10">
                        <label class="form-label">Password</label>
                        <input type="password" class="border form-control" name="password"
                            placeholder="please enter role name">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Role</label>
                        <select class="border form-control" name="role">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group float-end mt-3">
                    <button type="submit" class="btn btn-primary" id="submit_add_form">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
