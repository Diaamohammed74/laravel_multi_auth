@extends('back.master')
@section('title', 'Back | Admins')
@section('content')

    <!-- page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Add New Admin

                </h2>
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
                        <label class="form-label">{{ __('lang.name') }}</label>
                        <input type="text" class="border form-control" name="name" placeholder="please enter  name"
                            value="{{ old('name') }}">
                    </div>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <div class="form-group col-md-10">
                        <label class="form-label">{{ __('lang.photo') }}</label>
                        <input type="file" class="border form-control" name="photo" value="{{ old('phpto') }}">
                    </div>
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    <div class="form-group col-md-10">
                        <label class="form-label">{{ __('lang.email') }}</label>
                        <input type="email" class="border form-control" name="email" placeholder="please enter  email"
                            value="{{ old('email') }}">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <div class="form-group col-md-10">
                        <label class="form-label">{{ __('lang.password') }}</label>
                        <input type="password" class="border form-control" name="password"
                            placeholder="please enter  password" value="{{ old('password') }}">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class="form-group col-md-10">
                        <label class="form-label">{{ __('lang.Role') }}</label>
                        <select class="border form-control" name="role">
                            <option value="">{{ __('lang.Select Role') }}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
                <div class="form-group float-end mt-3">
                    <button type="submit" class="btn btn-primary" id="submit_add_form">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection