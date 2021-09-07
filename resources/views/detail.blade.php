@extends('master')
@section("content")
    <div class="container">
        <div class="row">
            @if($product['type']!='tableauTriptyque')
            <div class="col-sm-6">
                <img class="detail-img" src="../{{$product['file_path']}}">
            </div>
            @else
                <a href="#">
                <div class="row">
                                @foreach($file as $fil)
                                    <div class="col-sm-2">
                                    <img class="detail-img" src="../storage/uploads{{$fil}}">
                                    </div>
                                @endforeach



                </div>
                </a>

            @endif
            <div class="col-sm-6">
                <a href="/">Go Back</a>
                <h4>category: {{$product['type']}}</h4>
                <br><br>
                <form action="/add_to_cart" method="POST" novalidate>
                    @csrf
                    <input type="text" hidden  name="product_galley" value="{{$product['gallery']}}">
                    <div class="col-md-6 form-group">
                        <label for="name">avec cadre
                            <input type="radio" class="radio-control" name="cadre" id="AC" value="avec cadre" required>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="name">Sans Cadre
                            <input type="radio" class="radio-control"  name="cadre" id="SC" Value="sans cadre" required>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    @if($product['type']=='grandFormat')
                  <div name="mesure1" class="col-md-12 form-group">

                   <select class="form-control"  name="measure" id="mesure1" required>
                    <option value="180x50">180x50</option>
                    <option value="220x60">220x60</option>
                   </select>

                  </div>
                  <div name="mesure2" class="col-md-12 form-group">

                  <select class="form-control"  name="measure" id="mesure2" required>
                    <option value="184x54">184x54</option>
                    <option value="224x64">224x64</option>
                  </select>

                </div>
                    @elseif($product['type']=='tableauCarre')

                     <div name="mesure1" class="col-md-12 form-group">

                  <select class="form-control"  name="measure" id="mesure1" required>
                    <option value="100x60">100x60</option>
                    <option value="130x80">130x80</option>
                  </select>
                </div>
                  <div name="mesure2" class="col-md-12 form-group">

                  <select class="form-control"  name="measure" id="mesure2" required>
                    <option value="104x64">104x64</option>
                    <option value="134x84">134x84</option>
                  </select>

                </div>

                    @elseif($product['type']=='tableauTriptyque')

                     <div name="mesure1" class="col-md-12 form-group">

                  <select class="form-control"  name="measure" id="mesure1" required>
                    <option value="40x60">40x60</option>
                    <option value="60x100">60x100</option>
                  </select>

                </div>
                  <div name="mesure2" class="col-md-12 form-group">

                  <select class="form-control"  name="measure" id="mesure2" required>
                    <option value="44x64">44x64</option>
                    <option value="64x104">64x104</option>
                  </select>

                </div>
                    @endif
                    <button class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>
                <button class="btn btn-success">Buy Now</button>

            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script type="text/javascript">
        jQuery('#mesure1').hide('slow').val('');
        jQuery('#mesure2').hide('slow').val('');
        jQuery(document).ready(function() {
            jQuery('input:radio').on('click', function() {

                if(jQuery(this).attr('id') === 'AC' ) {
                    jQuery('#mesure1').show('slow');
                    jQuery('#mesure2').hide('slow').val('');

                } else if(jQuery(this).attr('name') === 'cadre' ){
                    jQuery('#mesure1').hide('slow').val('');
                    jQuery('#mesure2').show('slow');

                }
            });
        });
    </script>
@endsection

