@extends('welcome')

@section('content')

    @php $title = 'results'; $link = url('events') ;   @endphp
    <x-header :title="$title" :link="$link" />

{{--<section class="w-[80%]  m-auto px-auto   bg-white  position-static  inline-flex ">--}}

{{--    <div class="w-full    text-[#2f506c]   pt-[12px] pl-0 mt-12 ">--}}
{{--        <a href="{{}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[11px] px-3">--}}
{{--            {{  }}--}}
{{--        </a>--}}



                {{--news section        --}}

                    <!--{{--   news1     --}}-->
                    <!--@foreach($results as $result)-->
                    <!--@endforeach-->
                           
    </div>
    </section>

    {{--DIRECTORS--}}

        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
<x-endtag/>
@endsection

