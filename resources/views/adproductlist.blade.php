@extends('masterad')
@section("content")
    <div class="custom-product">
        <div class="col-sm-12">
            <div class="trending-wrapper">
                <h4>Products</h4>
                <br> <br>
                @if(Session::has('admin'))
                <div class="carousel-inner">
                    @foreach($products as $item)
                        @if($item->type!='tableauTriptyque')
                        <div class="row searched-item cart-list-devider">
                            <div class="col-sm-4">
                                <a href="detail/{{$item->gallery}}">
                                    <img class="trending-img" src="../{{$item->file_path}}">
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <h3>{{$item->type}}</h3>
                            </div>

                            <div class="col-sm-2">
                                <a href="/removeproduct/{{$item->gallery}}" class="btn btn-warning">Remove Product</a>
                            </div>
                        </div>
                        @else
                            <div class="row searched-item cart-list-devider">
                                <div class="col-sm-4">
                                    <a href="detail/{{$item->gallery}}">
                                        @foreach($file as $fil)
                                            <img class="detail-img" src="../storage/uploads{{$fil}}">
                                        @endforeach
                                    </a>
                                </div>
                                <div class="col-sm-2">
                                    <h3>{{$item->type}}</h3>
                                </div>

                                <div class="col-sm-2">
                                    <a href="/removeproduct/{{$item->gallery}}" class="btn btn-warning">Remove Product</a>
                                </div>
                            </div>
                        @endif

                    @endforeach

                </div>
            </div>
            <a class="btn btn-success" href="/admin/adproducts">addNewProduct</a>
        </div>

    </div>
    @else
        <p>No admin</p>
    @endif
@endsection
