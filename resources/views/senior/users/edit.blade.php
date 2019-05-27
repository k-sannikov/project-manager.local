@extends('layouts.app')

@section('content')
@include('senior.users.partials.modal')
<div class="row">
    <div class="col">
        <p class="h4 text-left">Редактирование пользователя</p>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-sm mr-3 pt-2 pb-2" data-toggle="modal" data-target="#delete">
       <b>Удалить пользователя</b>
    </button>
</div>

<form action="{{ route('senior.users.update', $user) }}" method="post">
    @csrf
    @method('put')
    @include('senior.users.partials.form')
    <div class="row justify-content-center">
        <a href="{{ route('senior.users.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-primary col-3"><b>Сохранить</b></button>
    </div>
</form>
@endsection
