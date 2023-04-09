@extends('layouts.app')

@section('head_title','Results')
@section('content')
<h1 class="mb-5">Results</h1>
    <div class="d-flex justify-content-center" style="flex-wrap: wrap">
        @foreach ($products as $product)
            @include('partials.cards')
        @endforeach
    </div>
@endsection