<!--<html>-->
<!--  <head>-->
<!---->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1" >-->
<!---->
<!--  </head>-->
<!--  <body>-->
<!---->
<!---->
<!--  dasdas-->


<!--<div>-->
<!--    dasdasd-->
<!--    <p>dddsdsd</p>-->
<!--</div>-->
<x-layouts.layout_test>

    <hr>
<!--    <p>dasda</p>-->

    {{$varr}}

    @push('scripts')
        <script>
            console.log('layouts.layout_test');
        </script>
    @endpush

    @push('styles')
    <style>
        body{
            background-color: aqua;
        }
    </style>
    @endpush

    <br>
    @include('test', ["varr" => "222"])
<!--    <x-test></x-test>-->

</x-layouts.layout_test>

<!--@push('scripts')-->
<!--    <script>-->
<!--        console.log('layouts.layout_test');-->
<!--    </script>-->
<!--@endpush-->
<!--dasd-->

<!--      dasd-->

<!--  </body>-->
<!--</html>-->

<!--<x-layouts.layout_test>-->
<!--    <div>-->
<!--        dasd-->
<!--        <div></div>-->
<!--                <x-my>-->
<!--                    dasd-->
<!--                </x-my>-->
<!--    </div>-->
<!--</x-layouts.layout_test>-->