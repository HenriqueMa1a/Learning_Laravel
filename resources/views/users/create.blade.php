@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')

<h1>Novo Usuário</h1>

<form action="{{route('users.store')}}" method="post">
    {{-- O token é para garantir que a proteção contra ataques csrf  --}}
    @csrf

    <input type="text" name="nome" placeholder="Nome:">
    <input type="email" name="email" placeholder="E-mail:">
    <input type="password" name="password" placeholder="Password:">

    <button type="submit">
        Enviar
    </button>
</form>

@endsection
