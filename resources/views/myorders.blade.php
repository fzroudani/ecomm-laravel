@extends('master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>My orders</h4>
                <br> <br>
                <div class="carousel-inner">
                    @foreach($orders as $item)
                        @if($item->type!='tableauTriptyque')
                            <div class="row searched-item cart-list-devider">
                                <div class="col-sm-3">
                                    <a href="detail/{{$item->id}}">
                                        <img class="trending-img" src="{{$item->file_path}}">
                                    </a>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Measure :{{$item->measure}}</h5>
                                    <h5>Cadre :{{$item->cadre}}</h5>
                                </div>
                            </div>
                        @else
                                <div class="row searched-item cart-list-devider">
                                    <?php
                                    $i=0;
                                    ?>
                                    @foreach($file as $fil)
                                        @if(Str::contains($fil,$item->gallery) && $i<3)
                                            <div hidden>{{$i=$i+1}}</div>
                                    <div class="col-sm-1">
                                        <a href="detail/{{$item->id}}">
                                            <img class="trending-img" src="storage/uploads{{$fil}}">
                                        </a>
                                    </div>
                                        @endif
                                    @endforeach
                                    <div class="col-sm-4">
                                        <h5>Measure :{{$item->measure}}</h5>
                                        <h5>Cadre :{{$item->cadre}}</h5>
                                    </div>
                                </div>

                        @endif
                    @endforeach

                </div>
            </div>
        </div>

    </div>
@endsection
