@extends('layouts.app')

@section('content')

<p class="h4">Задача</p>
<p><b>id: </b>{{ $task->task_id }}</p>
<p><b>Наименование: </b>{{ $task->task_name }}</p>
<p><b>Описание: </b>{{ $task->description }}</p>
<p><b>Приоритет: </b>{{ $task->priority }}</p>
<p><b>Статус: </b>{{ ($task->status == 0) ? 'Выполняется' : 'Завершена' }}</p>
<p><b>Дата создания: </b>{{ Date::parse($task->created_at)->format('j F Y г. H ч. i м.') }}</p>
<p><b>Дата редактирования: </b>{{ Date::parse($task->updated_at)->format('j F Y г. H ч. i м.') }}</p>

<div class="row justify-content-center">
    <a href="{{ route('junior.tasks.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
</div>
@endsection
