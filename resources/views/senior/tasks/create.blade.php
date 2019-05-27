@extends('layouts.app')

@section('content')
<form action="{{ route('senior.tasks.store') }}" method="post">
    @csrf
    <p class="h4 text-left">Создание задачи</p>
    @include('senior.tasks.partials.form')
    <div class="row justify-content-center">
        <a href="{{ route('senior.tasks.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
        &nbsp;&nbsp;
        <button type="submit" class="btn btn-outline-primary col-3"><b>Сохранить</b></button>
    </div>
</form>
@endsection
