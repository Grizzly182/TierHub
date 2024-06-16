@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="notice">Шаблон создан: <a class="text-decoration-none text-info"
                        href="{{ route('profile', $template->user_id) }}">{{ $template->user()->name }}</a></p>
                @auth
                    @if (Auth::user()->id == $template->user_id || Auth::user()->hasRole('Moderator'))
                        <form action="{{ route('templates.destroy', $template) }}" method="POST"
                            onsubmit="return confirm('Вы уверены, что хотите удалить шаблон?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-1">Удалить шаблон</button>
                        </form>
                    @endif
                @endauth
                <div id="tierlist-data" hidden>
                    {!! $template->data !!}
                </div>
                <div id="tierlist"></div>
                <script>
                    const data = JSON.parse(document.getElementById('tierlist-data').textContent);
                </script>

                @auth
                    <div class="row" style="padding: 30px;">
                        <form action="{{ route('templates.save-tierlist', $template) }}" method="POST">
                            @csrf
                            <input type="hidden" name="data" id="dataInput" required>
                            <label for="name">Название Тирлиста</label><br>
                            <div class="row">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $template->name }}" required>
                                <button type="submit" class="btn btn-primary mt-1">Сохранить тирлист в профиль</button>
                            </div>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
