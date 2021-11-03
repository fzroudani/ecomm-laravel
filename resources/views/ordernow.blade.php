@extends('master')
@section("content")
    <div class="custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                @foreach($products as $item)
                    @if($item->type!='tableauTriptyque')
                    <div class="img-box">
                        <img src="{{$item->file_path}}" width="200" alt=" pathinfo({{$item->file_path}}, PATHINFO_FILENAME) ">
                        <p><a download="{{$item->gallery}}" href="{{$item->file_path}}" title="{{$item->file_path}}">
                                Download
                            </a></p>
                        </div>
                    @else
                        @foreach($file as $fil)
                            @if(Str::contains($fil,$item->gallery))
                        <div class="img-box">
                            <img src="../storage/uploads{{$fil}}" width="200" alt=" pathinfo(../storage/uploads{{$fil}}, PATHINFO_FILENAME) ">
                            <p><a download="{{$fil}}" href="../storage/uploads{{$fil}}" title="../storage/uploads{{$fil}}">
                                    Download
                                </a></p>
                        </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                </tbody>
            </table>
            <div>
                <form action="orderplace" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default">Valider la commende</button>
                </form>
            </div>
        </div>
    </div>
@endsection
