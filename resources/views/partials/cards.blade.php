<div class="card me-5 mb-5 mycards" style="width: 18rem">
    <img
        src="{{$product->image}}"
        alt="{{$product->title}}"
    />
    <div class="card-body d-flex flex-column justify-content-between">
        <h5 class="card-title">{{$product->title}}</h5>
        <p class="card-text">{{substr($product->description,0,100)}}...</p>
        <h5 class="card-title">{{$product->price}}</h5>
        <form method="post" action="{{ route('carts.store') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}" />
            <button class="btn btn-primary">Add to shop cart</button>
        </form>
    </div>
</div>
