@extends('masterad')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <div class="trending-wrapper">
                <h4>The Non validated Carts</h4>
                @if(Session::has('admin'))
                <table class="table">
                    <tbody>
                    <thead>
                    <tr>
                        <th scope="col">Cart id</th>
                        <th scope="col">User name</th>
                        <th scope="col">Product</th>
                        <th scope="col">Products type</th>
                        <th scope="col">Products cadre</th>
                        <th scope="col">Products measure</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        @foreach($products as $product)
                            @if($user->cart_id==$product->cart_id && $user->id==$product->user_id)
                                @if($product->type!='tableauTriptyque')
                                <tr>
                                    <td>{{$user->cart_id}}</td>

                                    <td>{{$user->name}}</td>

                                    <td><img class="detail-img" src="../{{$product->file_path}}"></td>

                                    <td>{{$product->type}}</td>

                                    <td>{{$product->cadre}}</td>

                                    <td>{{$product->measure}}</td>

                                </tr>
                                @else
                                <tr>
                                    <td>{{$user->cart_id}}</td>

                                    <td>{{$user->name}}</td>
                                    <td>
                                        <?php
                                        $i=0;
                                        ?>
                                        @foreach($file as $fil)
                                                @if(Str::contains($fil,$product->gallery) && $i<3)
                                                <div hidden>{{$i=$i+1}}</div>
                                            <img class="detail-img" src="../storage/uploads{{$fil}}">
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>{{$product->type}}</td>

                                    <td>{{$product->cadre}}</td>

                                    <td>{{$product->measure}}</td>

                                </tr>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
                <br> <br>
                @else
                <p>No admin</p>
                @endif
        </div>
    </div>
@endsection
