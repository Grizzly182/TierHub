@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Создание шаблона</h2>
        <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">

                    <div class="form-group mt-3">
                        <label for="name">Название шаблона</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="255" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="category_id">Категория</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="avatar">Обложка шаблона</label><br>
                        <input type="file" class="form-control-file" id="avatar" name="avatar" required>
                        @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="tiers">Тиры</label>
                        <div id="tiers">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" maxlength="32"
                                        name="tiers[{{ $i }}][name]" placeholder="Название тира" required>
                                    <div class="input-group-append">
                                        <input type="color" name="tiers[{{ $i }}][color]"
                                            id="color{{ $i }}" value="#ff7f7f">
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <button class="btn btn-outline-secondary" onclick="addTier()" type="button"
                            id="button-addon2">Добавить тир</button>
                    </div>
                    <div class="form-group mt-3">
                        <label for="image">Элементы тирлиста (добавляйте сразу множество картинок)</label><br>
                        <input type="file" class="form-control-file" id="image" name="images[]" multiple required>
                        @error('images.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div id="images_output" >
                        <script>
                            $('#image').on('change', function() {
                                var images = $('#image')[0].files;
                                var div = $('#images_output');
                                div.empty();
                                for (var i = 0; i < images.length; i++) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        $('<img>').attr('src', e.target.result).attr('height', '100').attr('width', '100').attr('class', 'object-fit-cover').appendTo(div);
                                    }
                                    reader.readAsDataURL(images[i]);
                                }
                            });
                        </script>
                    </div>
                    <div class="form-group mt-5">
                        {{ __('Каждый созданный шаблон проходит обязательную проверку модераторами перед публикацией.') }}<br>
                        <button type="submit" class="btn btn-primary mt-3">Создать шаблон</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('color{{ $i }}');
            input.value = generateRandomColor();
        });

        let tierIndex = 3;

        function addTier() {
            let tiers = document.getElementById('tiers');
            if (tiers.children.length >= 10) return;
            let tier = document.createElement('div');
            tier.innerHTML = `
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="tiers[${tierIndex}][name]" placeholder="Название тира" required>\
                    <div class="input-group-append">
                                        <input type="color" name="tiers[${tierIndex}][color]"
                                            id="color${tierIndex}" value="#ff7f7f">
                                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="this.parentNode.parentNode.remove(); tierIndex--;">
                            <i class="fa fa-remove"></i>
                            </button>
                            </div>
                    </div>
            `;
            document.getElementById('tiers').appendChild(tier);
            tierIndex++;
        }

        const colorPickerInputs = document.querySelectorAll('input[type="color"]');

        colorPickerInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                const selectedColor = this.value;
                this.style.backgroundColor = selectedColor;
            });
        });
    </script>
@endsection
