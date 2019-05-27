@extends('layouts.app')

@section('content')

<div class="row mb-3">
    <p class="h4 col text-left">
        Управления пользователями
    </p>
    <a class="btn btn-outline-success btn-sm mr-3 pt-2 pb-2" href="{{ route('senior.users.create') }}" role="button">
      <b>Добавить пользователя</b>
    </a>
</div>

<div class="table-responsive">
  <table class="table table-bordered table-hover table-sm">
    <thead class="thead-light">
      <tr>
        <th scope="col" class="text-center" style="width: 5%">ID</th>
        <th scope="col">Имя</th>
        <th scope="col" class="text-center" style="width: 20%">E-mail</th>
        <th scope="col" class="text-center" style="width: 15%">Права доступа</th>
        <th scope="col" class="text-center" style="width: 22%">Действие</th>
      </tr>
    </thead>
    <tbody>
      @forelse($users as $user)
      <tr>
        <th class="align-middle text-center">{{$user->user_id}}</th>
        <td class="align-middle">{{ $user->name }}</td>
        <td class="align-middle text-center">{{ $user->email }}</td>
        <td class="align-middle text-center">{{ $user->role }}</td>
        <td class="text-center">
          <a class="btn btn-outline-primary btn-sm" href="{{ route('senior.users.show', $user) }}">
            <b>Просмотр</b>
          </a>
          &nbsp;&nbsp;
          <a class="btn btn-outline-success btn-sm" href="{{ route('senior.users.edit', $user) }}">
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
@if($users->total() > $users->count())
    {{ $users->links() }}
@endif
@endsection
