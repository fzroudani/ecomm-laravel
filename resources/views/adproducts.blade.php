@extends('masterad')
@section("content")


    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
<div class="container mt-5">
    <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <select class="form-control"  name="type" id="type" required>
                <option value="">type</option>
                <option value="grandFormat">Grand Format</option>
                <option value="tableauCarre">Tableau Carré</option>
                <option value="tableauTriptyque">Tableau Triptyque</option>
            </select>
        </div>
        <h3 class="text-center mb-5">Upload File in Laravel</h3>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="tableauCarre grandFormat file form-group">
            <label id="onefile" class="form-control" for="myfile">Select file</label>
            <input type="file" id="file" name="myfile" class="form-control" >

        </div>

        <div class="tableauTriptyque file form-group ">
            <input type="file" name="files[]" multiple class="custom-file-input" id="chooseFile">
            <label class="form-control" for="chooseFile">Select file</label>
        </div>

        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
            Upload Files
        </button>
    </form>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $("#type").change(function () {
                var inputVal = $(this).val();
                var eleBox = $("." + inputVal);
                $(".file").hide();
                $(eleBox).show();
            });
        });
    </script>

@endsection
