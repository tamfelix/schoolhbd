@extends('welcome')

@section('content')
    @php $title=$text[0]->{'title_'.app()->getLocale()}; $link=url('concours');   @endphp
<x-header :title="$title" :link="$link" />


@foreach($concours as $new)

        {{--   news1     --}}
        <div class="">
            <div class="flex flex-col items-center">

                <div class="font3 text-xl text-[#7fa7cb] pl-4">{{$new->title}}</div>
                @if($new->img)
                    <img src="{{env('APP_URL')}}/img/concours/{{$new->img}}" class="w-[400px] h-auto  m-4 rounded">
                @endif
            </div>
            <p class="font3 pl-12 text-gray-800">{{ $new->content }} </p>

            <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
                    <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                    <p class=" ">{{ substr($new->created_at, 0, 10)}}</p>
                    <i class="fas fa-comments fa-lg  p-3 pr-1 pl-4 text-[text-gray-500]"></i>

                </div>
            </div>
        </div>








@endforeach
    <p class="w-[300px] items-center">
        {{$concours->links()}}
    </p>


</div>

    </section>

        <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

    <x-endtag/>


@endsection

