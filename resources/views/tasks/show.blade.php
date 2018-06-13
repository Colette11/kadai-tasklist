@extends('layouts.app')

@section('content')
    @include('tasks.users', ['users' => $user])
@endsection