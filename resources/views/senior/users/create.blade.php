@extends('layouts.app')

@section('content')
<form action="{{ route('senior.users.store') }}" method="post">
    @csrf
    <p class="h4 text-left">Создание пользователя</p>
    @include('senior.users.partials.form')
    <div class="row justify-content-center">
        <a href="{{ route('senior.users.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-primary col-3"><b>Сохранить</b></button>
    </div>
</form>
@endsection
