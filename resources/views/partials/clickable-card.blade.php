    <a class="text-decoration-none" href="{{ $link }}">
        <div class="card card-custom mx-1">
            <img src="{{ asset('storage/' . $image) }}" class="card-img-top" alt="Card Image">
            <div class="card-body p-1" style="position: absolute; bottom: 1px; background-color: #000; height:max-content; width:100%;">
                <p class="card-text text-center text-decoration-none">{{ $text }}</p>
            </div>
        </div>
    </a>