@extends('layouts.app')

@section('content')
<div class="row mb-3">
    <p class="h4 col text-left">
        Задачи
    </p>
    <a class="btn btn-outline-success btn-sm mr-3 pt-2 pb-2" href="{{ route('senior.tasks.create') }}" role="button">
      <b>Добавить задачу</b>
    </a>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-hover table-sm">
    <thead class="thead-light">
      <tr>
        <th scope="col" class="text-center" style="width: 5%">ID</th>
        <th scope="col">Наименование задачи</th>
        <th scope="col" class="text-center" style="width: 10%">Приоритет</th>
        <th scope="col" class="text-center" style="width: 10%">Статус</th>
        <th scope="col" class="text-center" style="width: 20%">Исполнитель</th>
        <th scope="col" class="text-center" style="width: 22%">Действие</th>
      </tr>
    </thead>
    <tbody>
      @forelse($tasks as $task)
      <tr>
        <th class="align-middle text-center">{{$task->task_id}}</th>
        <td class="align-middle">{{ $task->task_name }}</td>
        <td class="align-middle text-center">
          <div class="progress">
            <div class="progress-bar progress-bar-striped bg-info text-body" role="progressbar"
              style="width: {{ $task->priority/5 }}%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5"><b>{{ $task->priority }}</b>
            </div>
          </div>
        </td>

          @if ($task->status == 0)
            <td class="align-middle text-center">
              <div class="col border border-secondary bg-warning">
                Выполняется
              </div>
            </td>
          @elseif ($task->status == 1)
            <td class="align-middle text-center">
              <div class="col border border-secondary bg-success">
                Завершена
              </div>
            </td>
          @endif

          @if ($task->status == 2)
              <td colspan="2" class="align-middle text-center">
                <div class="col border border-secondary bg-info">
                  Исполнитель не выбран
                </div>
              </td>
          @else
            <td class="align-middle text-center">{{ $task->name }}</td>
          @endif
        <td class="text-center">
          <a class="btn btn-outline-primary btn-sm" href="{{ route('senior.tasks.show', $task) }}">
            <b>Просмотр</b>
          </a>
          &nbsp;&nbsp;
          <a class="btn btn-outline-success btn-sm" href="{{ route('senior.tasks.edit', $task) }}">
              <b>Редактирование</b>
          </a>
        </td>
      </tr>
        @empty
          <td colspan="6"><div class="h5 text-center">Список задач пуст</div></td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@if($tasks->total() > $tasks->count())
    {{ $tasks->links() }}
@endif
@endsection
