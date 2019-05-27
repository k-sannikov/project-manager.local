@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <p class="h4 col text-left">
        Задачи
    </p>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-hover table-sm">
    <thead class="thead-light">
      <tr>
        <th scope="col" class="text-center" style="width: 5%">ID</th>
        <th scope="col">Наименование задачи</th>
        <th scope="col" class="text-center" style="width: 10%">Приоритет</th>
        <th scope="col" class="text-center" style="width: 5%">Статус</th>
        <th scope="col" class="text-center" style="width: 22%">Действие</th>
      </tr>
    </thead>
    <tbody>
      @forelse($tasks as $task)
      <tr>
        <th class="align-middle text-center">{{$task->task_id}}</th>
        <td class="align-middle">{{ $task->task_name }}</td>
        <td class="align-middle text-center">{{ $task->priority }}</td>

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
          @else
              //////
          @endif

        <td class="text-center">
          <a class="btn btn-outline-primary btn-sm" href="{{ route('junior.tasks.show', $task) }}">
            <b>Просмотр</b>
          </a>
          &nbsp;&nbsp;
            @if($task->status == 0)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete">
               <b>Завершить</b>
            </button>
              @include('junior.tasks.partials.modal')
            @endif
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
