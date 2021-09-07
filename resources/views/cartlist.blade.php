@extends('master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>Result for Products</h4>
                <a class="btn btn-success" href="ordernow">Order Now</a>
                <br> <br>
                <div class="carousel-inner">
                    @foreach($products as $item)
                        <div class="row searched-item cart-list-devider">
                           <div class="col-sm-4">
                               @if($item->type !='tableauTriptyque')
                               <a href="detail/{{$item->gallery}}">
                                   <img class="trending-img" src="{{$item->file_path}}">
                               </a>
                               @else
                                   <div class="row">
                                       @foreach($file as $fil)
                                           <div class="col-sm-4">
                                                   <img class="detail-img" src="../storage/uploads{{$fil}}">
                                           </div>
                                       @endforeach
                                   </div>
                               @endif
                           </div>
                            <div class="col-sm-3">
                                        <h2>{{$item->type}}</h2>
                                        <h2>{{$item->cadre}}</h2>
                                        <h2>{{$item->measure}}</h2>
                            </div>
                            <div class="col-sm-3">
                                <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning">Remove from Cart</a>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
            <a class="btn btn-success" href="ordernow">Order Now</a>
        </div>

    </div>
@endsection
