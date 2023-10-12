@extends('public.components.layout')

@section('content')

    {{-- about us --}}
    <div class="my-4 ">
        <div class="my-8 text-5xl justify-center text-center">
            <h1>About us</h1>
        </div>
        <div class="mx-8 font-light">
            {!! $about_us !!}
        </div>


    </div>

@stop
