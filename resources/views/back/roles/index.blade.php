@extends('back.master')
@section('title', 'Back | Roles')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h2 class="h5 page-title">Roles</h2>
                <div class="page-title-right">
                    <a href="{{ route('back.roles.create') }}" class="btn btn-primary">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3" id="mainCont">
        @include('layouts.messages')
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if (count($roles)>0)
                        @forelse ($roles as $role )
                        <tr>
                            <td>
                                {{$role->name}}
                            </td>
                            <td>
                                <a href="{{route('back.roles.edit',$role->id)}}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('back.roles.delete',$role->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </a>
                                </form>

                            </td>
                            @empty
                                <td>No yet</td>
                        </tr>
                        @endforelse

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
