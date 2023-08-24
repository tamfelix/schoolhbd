@extends('welcome')

@section('content')
    @php $title=$text[0]->{'title_'.app()->getLocale()}; $link=url('concours');   @endphp
<x-header :title="$title" :link="$link" />


@foreach($concours as $new)

        {{--   news1     --}}
        <div class="">
            <div class="flex flex-col items-center">

                <div class="font3 text-xl text-[#7fa7cb] pl-4">{{$new->title}}</div>
                <img src="/app/ganhbd/public/img/{{$new->img}}" class="w-[400px] h-auto  m-4">
            </div>
            <p class="font3 pl-12 text-gray-800">{{ $new->content }} ...</p>

            <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
                    <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                    <p class=" ">{{ substr($new->created_at, 0, 10)}}</p>
                    <i class="fas fa-comments fa-lg  p-3 pr-1 pl-4 text-[text-gray-500]"></i>

                </div>
            </div>
        </div>


{{--                <a class=" w-[100px] text-blue-400 inline-flex items-center" href="">--}}
{{--                    <div>Previous</div>  </a>--}}

{{--                    <a class=" w-[100px] text-blue-400 inline-flex items-center" href=""><div class=" ">Next</div>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right text-blue-400" viewBox="0 0 16 16">--}}
{{--                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}





@endforeach
    <p class="w-[300px] items-center">
        {{$concours->links()}}
    </p>


</div>

    </section>

        <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

    <x-endtag/>


@endsection

