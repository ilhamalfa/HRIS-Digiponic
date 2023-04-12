@extends('layouts.page')

@section('title')

@section('content')
    @isset($datas)
        <p>{{ $datas->posisi }}</p>
        @guest
            (Login First)
        @else
            @if (Auth::user()->role == 'Pelamar')
                @if($datas->lamaran()->where('user_id', auth()->user()->id)->exists())
                    <h6 class="text-white">(Applied)</h6>
                @else
                    <a href="{{ url('/pelamar/lowongan/apply/' . $datas->id) }}" class="btn btn-light">Apply</a>
                @endif
            @endif
        @endguest
    @endisset
@endsection