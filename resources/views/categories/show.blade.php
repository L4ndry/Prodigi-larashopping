@extends('layouts.app')

@section('head_title')
    {{$category->name}}
@endsection
    
@section('content')
<h1 class="mb-5">{{$category->name}}</h1>
    <div class="d-flex justify-content-center" style="flex-wrap: wrap; gap: 3">
        @foreach ($products as $product)
            @include('partials.cards')
        @endforeach
    </div>
@endsection