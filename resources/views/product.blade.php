<?php
$i=1;
?>

@extends('master')
@section("content")

    <div class="custom-product">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
               @foreach($products as $item)
                   @if($item->type!='tableauTriptyque')
                    <div class="item {{$i==1?'active':""}}">
                        <p hidden>{{$i++}}</p>
                      <a href="detail/{{$item->gallery}}">
                          <img class="slider-img" src="{{$item->file_path}}">
                          <div class="carousel-caption slider-text">
                              <h3>{{$item->type}}</h3>
                          </div>
                      </a>
                    </div>
                    @else
                        <div class="item {{$i==1?'active':""}}">
                            <p hidden>{{$i++}}</p>
                            <a href="detail/{{$item->gallery}}">
                                <div class="row">
                                    @foreach($file as $fil)
                                        @if(Str::contains($fil,$item->gallery))
                                        <div class="col-sm-4">
                                            <a href="detail/{{$item->gallery}}">
                                                <img class="slider-img" src="storage/uploads{{$fil}}">
                                            </a>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="carousel-caption slider-text">
                                    <h3>{{$item->type}}</h3>
                                </div>

                            </a>
                        </div>

                    @endif
                @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
{{--        <main id="main">--}}
{{--            <!-- ======= Works Section ======= -->--}}
{{--           --}}
{{--            <section class="section site-portfolio">--}}
{{--                <div class="container">--}}
{{--                    <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">--}}
{{--                        @foreach($products as $item)--}}
{{--                            @if($item->type!='tableauTriptyque')--}}
{{--                        <div class="item GrandFormat col-sm-6 col-md-4 col-lg-4 mb-4">--}}
{{--                            <a href="detail/{{$item->gallery}}" class="item-wrap fancybox">--}}
{{--                                <div class="work-info">--}}
{{--                                    <h3>{{$item->type}}</h3>--}}
{{--                                    <span>GrandFormat</span>--}}
{{--                                </div>--}}
{{--                                <img class="img-fluid" src="{{$item->file_path}}">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                            @else--}}
{{--                        <div class="item TableauTri col-sm-6 col-md-4 col-lg-4 mb-4">--}}
{{--                            <a href="detail/{{$item->gallery}}" class="item-wrap fancybox">--}}
{{--                                <div class="work-info">--}}
{{--                                    <h3>tableauTriptyque</h3>--}}
{{--                                    <span>TableauTri</span>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    @foreach($file as $fil)--}}
{{--                                    <div class="col-sm-6 col-md-4 col-lg-4">--}}
{{--                                        <img class="img-fluid" src="storage/uploads{{$fil}}">--}}
{{--                                    </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section><!-- End  Works Section -->--}}
{{--        </main><!-- End #main -->--}}
        <div class="trending-wrapper">
            <h3>Trending Products</h3>
            <div class="carousel-inner">
                @foreach($products as $item)
                    @if($item->type!='tableauTriptyque')
                    <div class="trending-item">
                        <a href="detail/{{$item->gallery}}">

                        <img class="trending-img" src="{{$item->file_path}}">
                        <div class="">
                            <h3>{{$item->type}}</h3>
                        </div>

                        </a>
                    </div>
                    @else
                        <div class="row ">
                            <a href="detail/{{$item->gallery}}">

                                @foreach($file as $fil)
                                    @if(Str::contains($fil,$item->gallery))
                                    <div class="col-sm-1" style="height: 50px; padding-left: 90px ;padding-right: 90px;padding-bottom: 50px; width: 20px;">
                                        <img class="trending-img" src="storage/uploads{{$fil}}">
                                    </div>
                                    @endif
                                @endforeach
                                    <div class="">
                                        <h3>{{$item->type}}</h3>

                                    </div>
                            </a>
                        </div>
                    @endif


                @endforeach
            </div>
        </div>
    </div>
@endsection
