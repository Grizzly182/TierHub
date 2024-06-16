@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($templates->count() == 0)
                <div class="text-center">
                    <h3>Нет шаблонов для модерации</h3>
                </div>
            @else
                @foreach ($templates as $template)
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10 ">
                                            <h5 class="card-title m-1"><a class="text-white"
                                                    href="{{ route('templates.show', $template) }}">{{ $template->name }}</a>
                                            </h5>
                                        </div>
                                        <div class="col-2">
                                            <form action="{{ route('templates.approve', $template) }}" method="POST">
                                                <button type="submit" class="btn btn-primary">Одобрить</button>
                                                @csrf
                                            </form>
                                            <form action="{{ route('templates.destroy', $template) }}" method="DELETE"
                                                onsubmit="return confirm('Вы уверены, что хотите удалить шаблон?')">
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
