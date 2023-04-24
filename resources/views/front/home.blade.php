@extends('front.master')
@section('title', 'Front | Home')
@section('content')
<h6>Hello {{Auth::user()->name}}</h6>
@endsection
