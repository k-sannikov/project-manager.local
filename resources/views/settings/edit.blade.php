@extends('layouts.app')

@section('content')
@include('settings.partials.modal')
<div class="row">
    <div class="col">
        <p class="h4 text-left">Настройки учетной записи</p>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-sm mr-3 pt-2 pb-2" data-toggle="modal" data-target="#delete">
       <b>Удалить учетную запись</b>
    </button>
</div>

<form action="{{ route('settings.update', $user) }}" method="post">
    @csrf
    @method('put')
    @include('settings.partials.form')
    <div class="row justify-content-center">
        <a href="{{ route('index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-primary col-3"><b>Сохранить</b></button>
    </div>
</form>
@endsection
