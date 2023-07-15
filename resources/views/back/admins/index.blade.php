@extends('back.master')
@section('title', 'Back | Admins')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">{{ __('lang.Admins') }}</h2>
                <div class="page-title-right">
                    <a href="{{ route('back.admins.create') }}" class="btn btn-primary" >
                        {{ __('lang.Add New') }}
                    </a>
                    {{-- <a href="{{ route('back.admins.create') }}" data-title="{{ __('lang.add_new_admin') }}" id="add_btn"
                        class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mainModal">
                        {{ __('lang.add_new') }}
                    </a> --}}

                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3" id="mainCont">
        <div class="card">
            <div class="table-responsive text-nowrap" style="font-family: 'Arial', sans-serif;">
                <table class="table table-striped ">
                    <thead>
                        <tr style="font-family: Arial">
                            <th>{{ __('lang.name') }}</th>
                            <th>{{ __('lang.email') }}</th>
                            <th>{{ __('lang.photo') }}</th>
                            <th>{{ __('lang.edit') }}</th>
                            <th>{{ __('lang.delete') }}</th>
                            <th>{{ __('lang.Roles') }}</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @if (count($admins) > 0)
                            @forelse ($admins as $admin)
                                <td>
                                    {{ $admin->name }}
                                </td>
                                <td>
                                    {{ $admin->email }}
                                </td>
                                <td>
                                    <img src="{{Storage::url($admin->photo)}}" alt="profile photo" height="80px" width="80px"/>
                                    {{-- <a href="{{ Storage::url($admin->photo) }}">Photo</a> --}}
                                </td>
                                <td>
                                    <a href="{{ route('back.admins.edit',$admin->id) }}" class="btn btn-info">
                                        {{ __('lang.edit') }}
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('back.admins.delete', $admin->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('lang.delete') }}</button>
                                    </form>
                                </td>
                                @if (count($admin->getRoleNames()) > 0)
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


{{-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Existing form content goes here -->
                <form action="{{ route('back.admins.store') }}" method="post" id="add_form" enctype="multipart/form-data">
                    <!-- Rest of the form content -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="add_form">Submit</button>
            </div>
        </div>
    </div>
</div> --}}