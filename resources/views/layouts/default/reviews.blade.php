@extends('welcome')

@section('content')



    @php $title = "Reviews"; $link = route('reviews.index') ;   @endphp
    <x-header :title="$title" :link="$link" />


                @foreach($range as $new)
                {{--news section        --}}

                    {{--   news1     --}}
                            <div class=" m-4 border rounded-lg">
                                <div class="flex inline-flex m-auto pt-4">

                                    <div class="   pl-4 pb-4">
                                        {{ $new->content }}
                                    </div>
                                    @if ($new->img)
                                        <img src="{{ env('APP_URL').'/img/reviews/'.$new->img }}" class="w-[200px] h-auto rounded-xl  mx-4">
                                    @endif
                                </div>
{{--                                <p class="font3 pl-12 text-gray-800 py-4">--}}
{{--                                    {{ $new->{'content_'.app()->getLocale()} }}--}}
{{--                                </p>--}}

                                <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                                    <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
{{--                                        DATE--}}
                                        <p class="pl-4"> de: {{ $new->name }} </p>
                                        <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                                        <p class=" ">{{ substr($new->created_at, 0, 10)}}</p>
                                    </div>
                                </div>



                            </div>
                            @endforeach





                        <p class="w-[300px] items-center pb-4">{{ $range->links() }}</p>

                        <section class=" m-4 w-[100%] border py-4">
                            <form action="{{ route('reviews.store') }}" method="POST" >
                                @csrf
                                @method('POST')
                                <p class="pl-4">{{ __('messages.comments') }}</p>
                                <textarea class="rounded w-[70%] h-[100px]   ml-4 mt-4" name="content"></textarea>
                                <div class="flex inline-flex m-auto items-center px-4 w-full ">
                                    <input type="text" value="{{ __('messages.from') }}" name="name" class="rounded h-[34px]">
                                    <x-submit></x-submit>
                                </div>
                            </form>
                        </section>

    </section>
    </div>


    <div class="">
        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
    </div>

<x-endtag/>
@endsection

