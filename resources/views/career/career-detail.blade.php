@extends('layouts.page')

@section('title')

@section('content')
    @isset($datas)
        <p>{{ $datas->posisi }}</p>
    @endisset
@endsection