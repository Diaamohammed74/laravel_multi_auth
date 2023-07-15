@extends('back.master')
@section('title', 'Admin | Home')
@section('content')
{{Auth::guard('admin')->user()->id}}
@includeWhen(Auth::guard('admin'),'back.messages')
@endsection
