<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>

        @if (count($errors))
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red"><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        @endif


       <form action="{{ url('upload-excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>upload file here</h2>
            <br>
            <div>
                <input type="file" name="file">
                <br>
                <br>
                <button type="submit">send</button>
            </div>
       </form>
    </body>
</html>
