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

<!--<x-layouts.layout >-->
<!--das d as da-->
<!--    <x-layouts.layout >-->
<!--        das d as da-->
<!--    </x-layouts.layout   >-->
<!--</x-layouts.layout   >-->
<!--<div>-->
<?php
//$tttt = 3123;
//$tttt = "ddd";
//    $tttt = ['dasda','dasdasd', "request" => request()];
    $tttt = request();
//    dd(111);
//    dd(serialize($tttt));
//    echo '<br>';
//    $tttt = serialize($tttt);
//$tttt = unserialize($tttt);
//    dd($tttt);
?>
<x-layouts.layout_test test_attr="dd" :dynamic="$tttt">7dq

<!--    <x-slot:title >-->
<!--        My title-->
<!--    </x-slot >-->
<!---->
<!--    <x-slot:tit >-->
<!--        <h2>Hello!!</h2>-->
<!--    </x-slot >-->

<!--        {{$tit ?? ''}}-->

    <!--    <x-layouts.layout >-->
    <!---->
    <!--    </x-layouts.layout>-->
    <!---->
    <!--    <hr>-->
    <!--    <p>dasda</p>-->
    <!---->
    <!--    {{$varr}}-->
    <!---->
<!--    @push('scripts_top')-->
<!--    <script>-->
<!--        console.log('layouts.layout_test_top');-->
<!--    </script>-->
<!--    @endpush-->
<!--        @push('scripts')-->
<!--            <script>-->
<!--                console.log('layouts.layout_test');-->
<!--            </script>-->
<!--        @endpush-->
    <!---->
        @push('styles')
        <style>
            body{
                background-color: aqua;
            }
        </style>
        @endpush
    <!---->
    <!--    <br>-->
<!--        @include('test', ["varr" => "222"])-->
<!--        <x-test></x-test>-->
<!--    <x-test>fdf</x-test>-->
<!--    <x-test/>-->
<!--    <x-test>-->
<!--        <x-test></x-test>-->
<!--        1113-->
<!--        <x-slot:title >-->
<!--            My title 555555-->
<!--        </x-slot >-->
<!--    </x-test>-->
    dasd
</x-layouts.layout_test>

<!--<x-slot:title >-->
<!--    My title 111-->
<!--    </x-slot >-->

<!--<x-test></x-test>-->
<!--asdfasdf asd-->
<!--as dfa-->

<!--<x-layouts.layout_test>-->
<!--    dddddddd-->
<!--</x-layouts.layout_test>-->

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