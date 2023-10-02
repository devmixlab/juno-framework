@props([
    "dasd" => "ttt", "test_attr", "dynamic"
])
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        @stack('styles')

        <title>{{$title ?? ''}}</title>
    </head>
    <body>
        <x-test_text name="ddd" :kk="ddasd" />

        <div>
            {{ $component->name }}
        </div>

        Text from layout

        {{$tit ?? ''}}

        {{$slot}}

        @stack('scripts_top')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @stack('scripts')
    </body>
</html>
