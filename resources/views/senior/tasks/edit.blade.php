@extends('layouts.app')

@section('content')
@include('senior.tasks.partials.modal')
<div class="row">
    <div class="col">
        <p class="h4 text-left">Редактирование задачи</p>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger btn-sm mr-3 pt-2 pb-2" data-toggle="modal" data-target="#delete">
       <b>Удалить задачу</b>
    </button>
</div>


<form action="{{ route('senior.tasks.update', $task) }}" method="post">
    @csrf
    @method('put')

    @include('senior.tasks.partials.form')

    <div class="row justify-content-center">
        <a href="{{ route('senior.tasks.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-primary col-3"><b>Сохранить</b></button>
    </div>
</form>

@endsection
