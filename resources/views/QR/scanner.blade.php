@extends('layouts.app')
@section('content')
{{--    <img src="{{asset('gifs/c1.gif')}}" alt="">--}}
    <div style="background-image: url('{{asset('gifs/c1.gif')}}'); width: 500px; height: 300px"></div>
@endsection
@section('js')
{{--    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>--}}
{{--    <script>--}}

{{--        function onScanSuccess(decodedText, decodedResult) {--}}
{{--            // handle the scanned code as you like, for example:--}}
{{--            console.log(`Code matched = ${decodedText}`, decodedResult);--}}
{{--        }--}}

{{--        function onScanFailure(error) {--}}
{{--            // handle scan failure, usually better to ignore and keep scanning.--}}
{{--            // for example:--}}
{{--            console.warn(`Code scan error = ${error}`);--}}
{{--        }--}}

{{--        let html5QrcodeScanner = new Html5QrcodeScanner(--}}
{{--            "reader",--}}
{{--            { fps: 10, qrbox: {width: 250, height: 250} },--}}
{{--            /* verbose= */ false);--}}
{{--        html5QrcodeScanner.render(onScanSuccess, onScanFailure);--}}

{{--    </script>--}}
@endsection