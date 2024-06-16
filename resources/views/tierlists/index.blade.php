@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Auth::user()->id == $tierlist->user_id || Auth::user()->hasRole('Moderator'))
                    <form action="{{ route('tierlists.destroy', $tierlist) }}" method="POST"
                        onsubmit="return confirm('Вы уверены, что хотите удалить тирлист?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">Удалить тирлист</button>
                    </form>
                @endif
                @php
                @endphp
                <div id="tierlist-data" hidden>
                    {!! json_decode($tierlist->data) !!}
                </div>
                <div id="tierlist-disabled" hidden>
                    {!! 'true' !!}
                </div>
                <div id="tierlist"></div>
                <script>
                    const data = JSON.parse(document.getElementById('tierlist-data').textContent);
                </script>
                @include('partials.comments-section')
            </div>
        </div>
    </div>
@endsection
