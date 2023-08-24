@extends('welcome')

@section('content')

    @php $title = __('sections.equipment'); $link = url('equipment') ;   @endphp
    <x-header :title="$title" :link="$link" />


                {{--news section        --}}
                <section class=" bg-gray-50 p-5 m-6 mb-0 mt-8">
                    @foreach($range as $item)
                    {{--   news1     --}}
                            <div class="">
                                <div class="flex flex-col items-center">

                                    <div class="font3 text-xl text-[#7fa7cb] pl-4">
                                        {{ $item->{'title_'.app()->getLocale() } }}
                                    </div>
                                    @if($item->img)
                                        <img src="{{ env('APP_URL').'/img/school/'.$item->img}}" class="w-[400px] h-auto  m-4">
                                    @endif
                                </div>
                                <p class="font3 pl-12 text-gray-800">{{ $item->{'content_'.app()->getLocale()} }} </p>

                                <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                                    <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
{{--                                        DATE--}}
                                        <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                                        <p class=" ">{{ substr($item->created_at, 0, 10)}}</p>
                                    </div>
                                </div>
                            </div>
                    @endforeach




                       <p class="w-[300px] items-center">{{ $range->links() }}</p>
                </section>


    </div>
    </section>

    <div class=" ">
        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
<x-endtag/>
@endsection

