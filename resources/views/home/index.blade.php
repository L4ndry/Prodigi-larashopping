@extends('layouts.app')

@section('head_title','Home')
    
@section('content')
    <h1 class="mb-5">Prodotti in offerta</h1>
    <div class="d-flex" style="flex-wrap: wrap">
        @foreach ($products as $product)
            @include('partials.cards')
        @endforeach
    </div>
@endsection