@extends('welcome')

@section('content')

    <main class="flex inline-flex w-full  ml-10 mt-10 mr-0 pr-0">

    <div class="w-[80%] mr-5  bg-gray-50 text-[#2f506c] p-3 pt-0  pb-0 pt-[12px] pl-0">


        {{--   message         --}}
        @if(session()->has('success'))
            <div class="alert alert-success w-[400px] h-[40px] p-2.5">{{session()->get('success')}}</div>
        @endif


        @error('name')

        <div class="alert alert-primary w-[400px] h-[40px] p-2.5">{{$message}}</div>

        @enderror




        <a href="{{url('moodle')}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[11px] px-3">
            Moodle
        </a>

        <section class="text-gray-700 font3 m-6">{{}}</section>

    </div>

@endsection
