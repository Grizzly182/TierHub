@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Редактирование профиля</h1>
        </div>
        <div class="row">
            <div class=" col-lg-4 col-md-12 col-sm-12 ">
                <div class="object-fit-cover"><img class="rounded-5 object-fit-cover" width="300" height="300"
                        src="{{ asset('storage/' . ($user->avatar ? $user->avatar : 'images/dwOQpRYGR0FjaQsuxk6t5nkqK4nIVZjxl5Sa3oa8.jpg')) }}"">
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="row">
                    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Новый пароль</label>
                            <input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" value="" autocomplete="off">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avatar">Аватар</label>
                            <input type="file" name="avatar" id="avatar" class="form-control">
                            @error('avatar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                    </form>

                    <div class="row mt-5">
                        <form action="{{ route('profile.destroy', $user) }}" method="POST"
                            onsubmit="return confirm('Вы уверены, что хотите удалить профиль?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить профиль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

