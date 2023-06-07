@extends('layouts.app')

@section('head_title','Shopping cart')

@section('content')
    <h1>Cart</h1>
   @include('partials.form_success')
    @if($carts->count()<=0)
        <h1>Empty</h1>
    @else
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Delete</th>
                <th >#</th>
                <th >Title</th>
                <th >Price</th>
                <th>Qty</th>
                <th >Total</th>
            </tr>
            </thead>
            <tbody>
                @foreach($carts as $i=>$cart)
                <tr>
                    <td>
                        <form method="post" action="{{route('carts.destroy',$cart)}}" id="">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger confirm_delete">X</button>
                        </form>
                    </td>
                    <th scope>{{$i+1}}</th>
                    <th scope>{{$cart->product->title}}</th>
                    <td>{{$cart->product->price}}</td>
                    <td><input type="text" value="{{$cart->quantity}}" name="quantity"></td>
                    <td>{{$cart->totalPrice($cart->product->price,$cart->quantity)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td>{{$cart->sum('quantity')}}</td>
                    <td>
                        {{json_decode($total)->Total}}
                    </td>
                </tr>
            </tbody>
        </table>
    @endif
    <script>
        $('.confirm_delete').click(e=>{
          if(!confirm('are you sure?')){
            e.preventDefault();
          }
        });
    </script>
@endsection