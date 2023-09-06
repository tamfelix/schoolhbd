@extends('welcome')
@section('content')

    {{--    BANNER--}}

    <section class="max-w-6xl  m-auto px-auto   bg-white  position-static mt-2 ">
         <div class="sm:block lg:hidden">
             <h3 class=" text-[#2f506c] text-lg mx-4 my-2">Ecole Ohalei Mena'hem</h3>
         </div>
         
        <img src="{{ env('APP_URL') }}/img/slide-5.jpeg" class="w-[100%] h-auto pt-5 parent position-sticky hidden lg:block">
        <div class="position-relative sopra0 font3 text-md hidden lg:block">
            <p class=" h-[40px] w-fit bg-[#6091ba] text-white px-3 py-1.5  uppercase mb-1">
                {{ __('sections.banner1') }}
            </p>
            <p class="bg-black h-[28px] px-3 text-white  opacity-75  w-[400px]">
                {{ __('sections.banner2') }}
            </p>
        </div>


        {{--MAIN SECTION        --}}


        {{--    first column    ABOUT            --}}
        <main class="flex inline-flex w-full   ">

       
        
            {{--  second column MAIN CONTENT NEWS--}}

    {{--MAIN SECTION CONTENT THAT WE INSERT INTO WELCOME.BLADE.PHP--}}

    <div class="w-[20%]  mr-4   text-[#2f506c] pb-3 hidden lg:block ">
{{--        ABOUT SECTION--}}
        <section class="bg-gray-50 mb-4 h-[200px] pt-3 items-center">
            <a class="font3 text-[#2f506c] text-lg p-3 pl-0 pt-[12px] border-t-2 border-[#6091ba] " href="{{ url('about') }}">
                {{ __('sections.about') }}
            </a>
            <img src="{{ env('APP_URL')}}/img/img1.jpeg" class="w-[150px] h-[120px] pl-[10%] pt-[20px]"/>
        </section>

{{--        TIMETABLE--}}
        <section class= "bg-gray-50  h-[400px] items-center flex flex-col">
            <a class="font3 text-[#2f506c] text-lg pt-4 pl-0   border-t-2 border-[#6091ba] align-items-lg-start" href="{{ url('timetables') }}">
                {{ __('sections.timetable') }}
            </a>
            <x-timetable :timetable="$timetable" class="items-center"></x-timetable>
            <a href="{{url('timetables')}}" class=" text-blue-400  ">
                <div class="flex inline-flex  font3 items-center text-center py-2">
                    <div class="">{{ __('sections.see') }}</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right text-blue-400" viewBox="0 0 16 16">
                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                    </svg>
                </div>
            </a>
        </section>

        {{--  IMAGES--}}
        <section class= "bg-gray-50  h-[250px] items-center flex flex-col mt-4">
            <a class="font3 text-[#2f506c] text-lg pt-4 pl-0   border-t-2 border-[#6091ba] align-items-lg-start " href="{{ route('photos.index') }} ">
                {{ __('sections.photos') }}
            </a>
            
            <div class="mt-1 flex inline-flex flex-wrap h-[160px] m-3 pl-2">
                @foreach($photos as $image)
                    @if($loop->index < 6)
                    <a href="{{ route('photos.show', $image['id']) }}" class="m-1">
                        <img src="{{ env('APP_URL').'/'.$image['link'] }}" class="h-[50px] border-white border-l-4 frame1 items-center">
                    </a>
                   
                    @endif
                @endforeach
            </div>
        </section>
        {{--WEATHER WIDGET--}}
        <section class="bg-gray-50  mt-4 h-[200px] pt-3">
            <a class="font3 text-[#2f506c] text-lg p-3 pl-0 pt-[12px] border-t-2 border-[#6091ba] ">
                {{ __('sections.weather') }}
            </a>
            <div class="pt-3 px-2 w-[200px] m-auto">
                <a href="https://yandex.it/weather/geneva?lat=446.203548&amp;lon=6.140003" target="_blank">
                    <img src="https://info.weather.yandex.net/163/2_white.ru.png?domain=it" border="0" alt="Weather">
                    <img width="1" height="1" src="https://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*https://img.yandex.ru/i/pix.gif" alt="" border="0">
                </a>
            </div>
        </section>
    </div>


    {{--    second column      NEWS          --}}


<div class="lg:w-[60%] mr-4  bg-gray-50 text-[#2f506c] p-3   pb-0 pt-[12px] pr-3 mb-0 adapt sm:w-[100%]">
    <a href="{{url('novitas')}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[15px] px-3 h3">
        News
    </a>

    @foreach($news as $new)
        <section class="mt-6" >
            {{--   news1     --}}
            <div class="border-b">
                <div class="flex inline-flex">
                    
                    <img src="{{env('APP_URL').'/img/news/news.png' }}" class="w-auto h-[30px] pl-3 mt-2">
                 
                    <div class="font3 text-[#7fa7cb] pl-4 text-blue-400">
                        <a href="{{ route('novitas.show', $new->id) }}">{{$new->{'title_'.app()->getLocale()} }}</a>
                    </div>
                </div>
                <div class="font4 pl-12 ml-[30px] ">
                    {!! substr($new->{'content_'.app()->getLocale()}, 0, 240) !!} ...
                </div>

                <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                    <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
                        <i class="fa fa-calendar fa-sm  p-3 pr-2 pl-12 text-[text-gray-500]"></i>
                        <p class=" ">
                            {{ substr($new->created_at, 0, 10)}}
                        </p>
                        <form action="{{ url('nlike') }}" method="GET">
                            <input class="hidden" name="id" value="{{ $new->id }}" />
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up ml-3 mr-1" viewBox="0 0 16 16">
                                    <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                </svg>
                            </button>
                        </form>
                        <p class="pr-4">
                            {{$new->likes}}
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="ml-1 bi bi-eye-fill " viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        <p class="pl-1 ">
                            {{$new->views}}
                        </p>
                    </div>
                    <a class=" w-[100px] text-blue-400 inline-flex items-center" href="{{ route('novitas.show', $new->id) }}">
                        <div class=" ">{{ __('sections.read') }}..</div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right text-blue-400" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
                        </svg>
                    </a>
                </div>
            </div>

        </section>

    @endforeach

    <a href="{{url('novitas')}}" class="text-blue-400 p-1 pl-4 font3 pt-6 h-[60px] inline-flex items-center">
        Read all...
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right text-blue-400" viewBox="0 0 16 16">
            <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
        </svg>

    </a>
</div>

{{--            RIGHT MENU--}}

<x-rightmenu :sidemenu="$sidemenu" :director="$director" class=" "/>
        </main>

    {{--                    TEACHERS CAROUSEL--}}

    <x-carousel-component :teachers="$teachers" />

@endsection
