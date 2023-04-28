@extends('layouts.app')

@section('title', 'Editar o usuário: {{$user->name}}')

@section('content')

<h1>Editar Usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>

@endif

<form action="{{route('users.update', $user->id)}}" method="post">

    {{-- <input type="hidden" name="_method" value="PUT"> --}}
    @method('PUT')

    {{-- O token é para garantir que a proteção contra ataques csrf  --}}
    @csrf

    <input type="text" name="name" placeholder="Nome:" value="{{$user->name}}">
    <input type="email" name="email" placeholder="E-mail:" value="{{$user->email}}">
    <input type="password" name="password" placeholder="Password:">

    <button type="submit">
        Enviar
    </button>
</form>

@endsection
