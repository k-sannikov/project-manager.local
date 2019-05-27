@extends('layouts.app')

@section('content')

<p class="h4">Информация о пользователе</p>

<p><b>id: </b>{{ $user->user_id }}</p>
<p><b>Имя: </b>{{ $user->name }}</p>
<p><b>E-mail: </b>{{ $user->email }}</p>
<p><b>Права доступа: </b>{{ $user->role }}</p>
<p><b>Дата создания: </b>{{ $user->created_at }}</p>
<p><b>Дата редактирования: </b>{{ $user->updated_at }}</p>
<div class="row justify-content-center">
    <a href="{{ route('senior.users.index') }}" class="btn btn-outline-primary col-3"><b>Назад</b></a>
</div>
@endsection
