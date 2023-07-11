<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <ul style="padding:100px">
            <li style="font-weight:bold">
                <a href="{{ url('upload-excel') }}">task 1 url</a>
            </li>
            <li style="font-weight:bold">
                <a href="{{ url('queries') }}">task 2 url</a>
            </li>
            <li style="font-weight:bold">
                <a href="{{ url('cron-job') }}">task 3 url</a>
            </li>
        </ul>
    </body>
</html>
