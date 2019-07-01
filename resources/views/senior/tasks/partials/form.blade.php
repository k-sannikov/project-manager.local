<div class="form-group">
    <div class="form-row">
        <div class="col">
            <label for="task_name">Наименование</label>
            <input type="text" class="form-control @error('task_name') is-invalid @enderror" id="task_name" name="task_name" value="{{$task->task_name ?? old('task_name')}}">
            @error('task_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">

    <label for="description">Описание</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="3">{{$task->description ?? old('description', '')}}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
</div>
<div class="form-group">
    <div class="form-row">
        <div class="col">
            <label for="priority">Приоритет <span class="text-muted">(от 0 до 500)</span></label>
            <input type="number" class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority" value="{{$task->priority ?? old('priority')}}">
            @error('priority')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="status">Статус</label>
            <select class="custom-select @error('status') is-invalid @enderror" id="status" name="status">
                <option {{(($task->status ?? old('status')) == "2") ? "selected" : ""}}>
                    Не назначен
                </option>
                <option value="0" {{(($task->status ?? old('status')) == "0") ? "selected" : ""}}>
                    Выполняется
                </option>
                <option value="1" {{(($task->status ?? old('status')) == "1") ? "selected" : ""}}>
                    Завершена
                </option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
<div class="form-group">
    <label for="user_id">Исполнитель</label>
    <select class="custom-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
        <option value="0" {{(($task->user_id ?? old('user_id')) == "0") ? "selected" : ""}}>
            Исполнитель не выбран
        </option>

        @forelse($juniors as $junior)
        <option value="{{ $junior->user_id }}" {{($junior->user_id == ($task->user_id ?? old('user_id'))) ? "selected" : ""}}>
            {{ $junior->name }}
        </option>
        @empty

        @endforelse

    </select>
    @error('user_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

