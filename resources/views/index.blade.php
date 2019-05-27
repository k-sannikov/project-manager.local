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
        <th scope="col" class="text-center" style="width: 10%">Статус</th>
        <th scope="col" class="text-center" style="width: 20%">Исполнитель</th>
      </tr>
    </thead>
    <tbody>
      @forelse($tasks as $task)
      <tr>
        <th class="align-middle text-center">{{$task->task_id}}</th>
        <td class="align-middle">{{ $task->task_name }}</td>

          @if ($task->status == 0)
            <td class="align-middle text-center">
              <div class="col border border-secondary bg-warning">
                Выполняется
              </div>
            </td>
            <td class="align-middle text-center">{{ $task->name }}</td>
          @elseif ($task->status == 1)
            <td class="align-middle text-center">
              <div class="col border border-secondary bg-success">
                Завершена
              </div>
            </td>
            <td class="align-middle text-center">{{ $task->name }}</td>
          @else
              <td colspan="2" class="align-middle text-center">
                <div class="col border border-secondary bg-info">
                  Исполнитель не выбран
                </div>
              </td>
          @endif
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
