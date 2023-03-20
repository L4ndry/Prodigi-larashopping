<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="{{route('home')}}">LaraShopping</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        @foreach ($categories as $category)
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.show',$category)}}">{{$category->name}}</a>
        </li>
        @endforeach
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item"><a href="{{route('carts.index')}}" class="nav-link active" aria-current="page">Cart</a></li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
    </div>
</nav>