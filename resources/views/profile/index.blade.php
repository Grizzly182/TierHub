@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2 col-lg-3 col-md-6 col-sm-12">
                <div class="object-fit-cover"><img class="rounded-5 object-fit-cover" width="300" height="300"
                        src="{{ asset('storage/' . ($user->avatar ? $user->avatar : 'images/dwOQpRYGR0FjaQsuxk6t5nkqK4nIVZjxl5Sa3oa8.jpg')) }}"">
                </div>
            </div>
            <div class="col-10 col-lg-5 col-md-6 col-sm-12">
                <div class="row">
                    <h2>{{ $user->name }}</h2>
                </div>
                <div class="row">
                    <h4 class="text-white-50">Дата регистрации: {{ $user->created_at }}</h4>
                </div>
                @if(Gate::allows('update-user', $user))
                <div class="row">
                    <a href="{{ route('profile.edit', $user) }}" class="btn btn-primary">Редактировать профиль</a>
                </div>
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3>Созданные шаблоны:</h3>
                @if (count($templates) > 0)
                <div class="d-flex flex-wrap flex-row w-100">
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
                @else
                    <h5 class="text-center mt-5">Нет созданных шаблонов</h5>
                @endif
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h3>Сохрененные тирлисты:</h3>
                @if (count($tierlists) > 0)
                <div class="d-flex flex-wrap flex-row w-100">
                    @foreach ($tierlists as $tierlist)
                        <div style="width: 25%; max-width:216px; padding: 2px;">
                            @include('partials.clickable-card', [
                                'image' => $tierlist->template()->image,
                                'text' => $tierlist->name,
                                'link' => route('tierlists.show', $tierlist->id),
                            ])
                        </div>
                    @endforeach
                </div>
                @else
                    <h5 class="text-center mt-5">Нет сохрененных тирлистов</h5>
                @endif
            </div>
        </div>
    </div>
@endsection
