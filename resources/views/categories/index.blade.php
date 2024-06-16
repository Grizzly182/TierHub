@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <h1>Все категории</h1>
        </div>
        @can('create category')
            <a href="{{ route('categories.create') }}" class="btn btn-primary mt-3 mb-3">Создать категорию</a>
        @endcan
        <div class="d-flex flex-wrap flex-row w-100">
            @foreach ($categories as $category)
                <div style="width: 25%; max-width:216px; padding: 2px;">
                    @include('partials.clickable-card', [
                        'image' => $category->image_path,
                        'text' => $category->name,
                        'link' => route('categories.show', $category->id),
                    ])
                </div>
            @endforeach
        </div>
    </div>
@endsection
