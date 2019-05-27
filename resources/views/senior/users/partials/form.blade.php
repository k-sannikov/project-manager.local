<div class="form-group">
    <div class="form-row">
        <div class="col">
            <label for="name">Имя</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name ?? old('name')}}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="email">E-mail</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email ?? old('email')}}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <div class="form-row">
        <div class="col">
            <label for="password">Пароль</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col">
            <label for="role">Права доступа</label>
            <select class="form-control @error('role') is-invalid @enderror" id="role" name="role">
                <option value="user" {{ (($user->role ?? old('role')) == "user") ? "selected" : "" }}>
                    User
                </option>
                <option value="senior" {{ (($user->role ?? old('role')) == "senior") ? "selected" : "" }}>
                    Senior
                </option>
                <option value="junior" {{ (($user->role ?? old('role')) == "junior") ? "selected" : "" }}>
                    Junior
                </option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
