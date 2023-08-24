
@extends('welcome')

@section('content')


        @php $link = route('meals.index'); $title = 'meals'; @endphp
        <x-header :link="$link" :title="$title"/>


                {{--news section        --}}
                    <section class=" p-5  mr-5">
                        @foreach($meals as $item)
                        {{--   news1     --}}
                                <div class="">
                                    <div class="flex flex-col items-center">
                                        <div class="font3 text-xl text-[#7fa7cb] pl-4">
                                            {{ $item->{ 'title_'.app()->getLocale()} }}
                                        </div>
                                        <img src="{{env('APP_URL').'/img/meals/'.$item->img}}" class="w-[400px] frame h-auto  m-4">
                                    </div>
                                    <p class="font3 pl-12 text-gray-800">
                                        {{ $item->{ 'content_'.app()->getLocale()} }}
                                    </p>

                                    <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                                        <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
    {{--                                        DATE--}}
                                            <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                                            <p class=" ">{{ substr($item->created_at, 0, 10)}}</p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach

                        <p class="w-[300px] items-center">
                             {{ $meals->links() }}
                        </p>
                    </section>

             </div>


    </section>

    {{-- right menu   --}}
    <div class="">
        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
    </div>
<x-endtag />
@endsection

