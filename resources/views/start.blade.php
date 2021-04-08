@extends('layouts.app')

@section('content')

{{--    <prop-component :urldata="{{json_encode($url)}}"></prop-component>--}}

{{--    <ajax-component></ajax-component>--}}
{{--    <chartline-component></chartline-component>--}}

    <socket-component></socket-component>
@endsection

