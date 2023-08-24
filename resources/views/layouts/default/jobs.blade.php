@extends('welcome')

@section('content')

    @php $title = __('sections.jobs'); $link = url('jobs') ;   @endphp
    <x-header :title="$title" :link="$link" />

{{--<section class="w-[80%]  m-auto px-auto   bg-white  position-static  inline-flex ">--}}

{{--    <div class="w-full    text-[#2f506c]   pt-[12px] pl-0 mt-12 ">--}}
{{--        <a href="{{}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[11px] px-3">--}}
{{--            {{  }}--}}
{{--        </a>--}}



                {{--news section        --}}

                    {{--   news1     --}}
                @if(!is_string($range))
                    @foreach($range as $item)
                            <div class="">
                                <div class="flex flex-col items-center">

                                    <div class="font3 text-xl text-[#7fa7cb] pl-4 py-4">
                                        {{ $item->title }}
                                    </div>

                                </div>
                                <p class="font3 pl-12 text-gray-800">
                                    {{ $item->content }}
                                </p>

                                <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                                    <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
{{--                                        DATE--}}
                                        <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                                        <p class=" ">
                                            {{ substr($item->created_at, 0, 10)}}
                                        </p>


                                    </div>
                                </div>
                            </div>

                    @endforeach


                    {{  $range->links() }}
                    @else
                    <p class="mt-4">Pas de emplois disponibles pour le moment</p>
                    @endif

    </div>
    </section>

    {{--DIRECTORS--}}

        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
<x-endtag/>
@endsection

