@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>TierHub</h1>
                <h2>Добро пожаловать!</h2>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-12 mb-5">
                <h3>Популярные категории</h3>
                <div class="d-flex justify-content-center flex-wrap flex-row w-100">
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
            <div class="col-md-12 mt-5">
                <h3>Популярные Шаблоны</h3>
                <div class="d-flex justify-content-center flex-wrap flex-row w-100">
                    @foreach ($templates as $template)
                        <div style="width: 25%; max-width:216px; padding: 2px;">
                            @include('partials.clickable-card', [
                                'image' => $template->image,
                                'text' => $template->name,
                                'link' => route('templates.show', $template->id),
                            ])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection