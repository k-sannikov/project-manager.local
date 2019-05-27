@extends('layouts.app')

@section('content')

<p class="h4">Задача</p>
<p><b>id: </b>{{ $task->task_id }}</p>
<p><b>Наименование: </b>{{ $task->task_name }}</p>
<p><b>Описание: </b>{{ $task->description }}</p>
<p><b>Приоритет: </b>{{ $task->priority }}</p>
<p><b>Имя исполнителя: </b>{{ $user->name }}</p>
<p><b>E-mail исполнителя: </b>{{ $user->email }}</p>
<p><b>Права доступа исполнителя: </b>{{ $user->role }}</p>
<p><b>Статус: </b>{{ ($task->status == 0) ? 'Выполняется' : 'Завершена' }}</p>
<p><b>Дата создания: </b>{{ $task->created_at }}</p>
<p><b>Дата редактирования: </b>{{ $task->updated_at }}</p>

<div class="row justify-content-center">
    <a href="{{ route('junior.tasks.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
</div>
@endsection
