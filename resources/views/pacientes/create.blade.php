@extends('layouts.app')

@section('content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@include('pacientes.fields')
@endsection