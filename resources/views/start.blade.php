@extends('layouts.app')

@section('content')

    <prop-component :urldata="{{json_encode($url)}}"></prop-component>
@endsection

