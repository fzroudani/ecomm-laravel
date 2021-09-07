@extends('masterad')
@section("content")
    <div class="custom-product">
        <div class="col-sm-12">
            <div class="trending-wrapper">
                <h4>The validated Carts</h4>
                @if(Session::has('admin'))
                <table class="table">
                    <tbody>
                    <thead>
                    <tr>
                        <th scope="col">Order id</th>
                        <th scope="col">User name</th>
                        <th scope="col">Products</th>
                        <th scope="col">Products number</th>
                        <th scope="col">Products type</th>
                        <th scope="col">Products cadre</th>
                        <th scope="col">Products measure</th>

                        <th scope="col"></th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        @foreach($products as $product)
                            @if($user->order_id==$product->order_id && $user->id==$product->user_id)
                                @if($product->type!='tableauTriptyque')
                                    <tr>
                                        <td>{{$user->order_id}}</td>

                                        <td>{{$user->name}}</td>

                                        <td><img class="detail-img" src="../{{$product->file_path}}"></td>

                                        <td>{{$product->type}}</td>

                                        <td>{{$product->cadre}}</td>

                                        <td>{{$product->measure}}</td>


                                        <td><a href="/validercommande/{{$user->order_id}}" class="btn btn-success">valider la commande</a> </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{$user->order_id}}</td>

                                        <td>{{$user->name}}</td>
                                        <td>
                                    @foreach($file as $fil)


                                            <img class="detail-img" src="../storage/uploads{{$fil}}">

                                    @endforeach
                                        </td>
                                        <td>{{$product->type}}</td>

                                        <td>{{$product->cadre}}</td>

                                        <td>{{$product->measure}}</td>


                                        <td><a href="/validercommande/{{$user->order_id}}" class="btn btn-success">valider la commande</a> </td>
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
