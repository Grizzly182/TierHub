@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Create new template --}}
        <div class="row">
            <h1>Категория "{{ $category->name }}"</h1>
        </div>
        <div class="d-flex flex-wrap flex-row w-100">
            <div style="width: 25%; max-width:216px; padding: 2px;">
                @include('partials.clickable-card', [
                    'image' => '/images/360_F_256864782_iA0jhzIzu7FZgIbU45qFhVkM3vEICd3l.jpg',
                    'text' => 'Создать новый шаблон',
                    'link' => route('templates.create'),
                ])
            </div>

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
@endsection