<!DOCTYPE html>
@php $locale = app()->getLocale() @endphp
<html lang="{{ str_replace('_', '-', $locale) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ env('APP_URL').'/css/app.css' }}">

        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/0ce84235fb.js" crossorigin="anonymous"></script>

        <title>Ecole Ohalei Mena'hem</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=OpenSans:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=HelveticaNeue:wght@300;400;600;700&display=swap" rel="stylesheet">



        <style>
            body {}
            .font1 {font-family: 'Helvetica Neue', Arial, sans-serif; font-size: 13px; font-weight: 300;  }
            .font2{font-family: 'Open Sans', sans-serif; font-size: 14px; font-weight: 300; line-height: 20px;}
            .font3{font-family: 'Open Sans', sans-serif; font-size: 15px; font-weight: 400; line-height: 29px;}
            .font4{font-family:system-ui,-apple-system; font-size: 14px; font-weight: 300; line-height: 20px;}
            .font5{font-family:system-ui,-apple-system; font-size: 15px; font-weight: 400; line-height: 20px;}
            h3{font-weight: bold; font-size: 16px;}

            a, a:hover{text-underline: none!important; text-decoration: none}
            li{list-style-type: none}
            .sopra0{position: relative; left: 30px; bottom: 120px;}
            .parent{position: static; display: inline-block}
                .frame{ border: 10px solid rgb(242, 240, 240);
                box-shadow: 0 0 3px grey}

        </style>
    </head>
<body>
    <main class="antialiased  ">

{{--    AD MENU--}}
    <nav class=" bg-blue-800 text-blue-400 h-[32px] font2 items-center flex ">
        <ul class="flex inline-flex items-center ">
            @foreach($topmenu as $aditem)
            <a href=" {{ url($aditem->link)  }} "><li class="list-none  p-2">{{ ucfirst( $aditem->{'title_'.$locale} ) }}   &nbsp; | </li>
            @endforeach

{{--AUTH--}}
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 pr-4 pt-2 sm:block ">

                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-xs text-white  ">

                            {{ __('sections.dashboard') }}</a>
                    @else
                        <div class="flex inline-flex">
                            <a href="{{ route('login') }}" class="text-xs text-white flex inline-flex "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                </svg>
                                <div class=" ml-1">{{ __('messages.login') }}</div>
                            </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-xs  text-white ">{{ __('messages.register') }}</a>
                        @endif
                        </div>

                    @endauth
                </div>
            @endif
        </ul>
    </nav>



{{--SOCIAL MENU--}}

        <nav class="flex inline-flex justify-between bg-blue-700 h-[43px] w-[100%] text-white  pl-2 font2 uppercase items-center">
            <div class="flex inline-flex items-center">
                @foreach($socials as  $icon)
                    <a href="{{$icon['hlink']}}"><li class="ml-2  mx-1 p-1.5  rounded-2xl bg-blue-800">{!!$icon['link']!!}</li></a>
                @endforeach


            </div>
            <div class="inline-flex flex-row">
            {{--        SEARCH WINDOW        --}}

                <form class=" inline-flex ml-48" action="" method="POST">
                    @csrf
                    @method('POST')
                    <input type="search" class="  h-[26px] w-26 ml-2  text-grey-100 flex" content="search..."  >
                    <input type="submit" value="{{ __('messages.search') }}" class="bg-green-600 h-[26px] rounded text-xs  ml-[3px] w-18 px-2">
                </form>
                {{-- LANGUAGE CHANGE               --}}


                <div class="mx-2">
                @foreach(config('app.available_locales') as $area)
                    <a href="{{request()->url() }}?language={{ $area }}"
                        class="@if ( app()->getLocale() == $area ) border-b border-white border-b-2  @endif inline-flex items-center px-1">
                        {{strtoupper($area)}}
                    </a>
                @endforeach
                </div>
                    {{--                {{ __('messages.welcome') }}--}}
{{--                <form action="{{route('changeLang')}}" method="POST">--}}
                    @csrf
                    @method('POST')
{{--                    <select name="lang" id="lang" class="inline-flex h-4 bg-transparent changeLang">--}}
{{--                        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>Fr</option>--}}
{{--                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>Eng</option>--}}
{{--                    </select>--}}

{{--                </form>--}}
            </div>
        </nav>




{{--LOGO SECTION--}}
    <nav class="relative flex items-top justify-center bg-gray-50   items-center sm:pt-0 ">

            <section class="flex justify-between h-[113px]  w-full  text-[#6c9abf]  items-center">
                <div class="flex inline-flex w-[50%]  ">
                    <a href="{{ url('/') }}" class="">
                        @foreach($contact as $habad) @endforeach
                        <img href="/{{ $habad['photo']}}" class="h-16 w-24 pt-2 pl-8 pl-7" />
                        </a>


                        <a href="{{url('/')}}" class="inline-flex"><div class="pt-[10%] pl-2 text-lg  ">School {{$habad['name']}}</div></a>

                </div>


                <div class=" pr-4 font2  flex flex-col">

                    <div class="inline-flex items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                        </svg><p class="ml-2"><a href="javascript: openWindow()"> {{$habad['tel']}}</a></p>
                    </div>
                    <div class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
                        <p class="ml-2"><a href="mailto:{{$habad['email']}}"> {{$habad['email']}}</a></p>
                        </p>
                    </div>
                </div>
            </section>
    </nav>

{{--  MID MENU              --}}
    <nav>
                <ul class="flex inline-flex bg-blue-400 h-10 w-[100%]  text-white  pl-7 font3 uppercase items-center position-relative">

                    <div class="dropdown show items-center "><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg></div>

                        <li class="px-3"><a href="{{url('novitas')}}">news</a></li>

                        @foreach($midmenu as $menu)
                        <li><a class=" mx-3"  href="#" role ="btn" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $menu->{'title_'.$locale} }}<i class="fa fa-angle-down mx-1"></i>
                            </a>


                            <ul class="dropdown-menu mt-[11px] rounded-0" aria-labelledby="dropdownMenuLink">
                                {!! $menu->{'link_'.$locale} !!}
                            </ul>
                        </li>
                    @endforeach

                </ul>
    </nav>

{{--        BLADE CONTENT--}}
<main class="mx-auto p-0 items-center w-full  flex flex-row">
            @yield('content')






                    {{--      PARACHA--}}
                    @php $url = route('parachas.show', 1); $label = __('sections.paracha');   @endphp
                    <x-section :label="$label" :url="$url" />
                    <div class="">
                            <h3 class="m-auto py-3 text-center">{{ $paracha[0]->{'title_'.$locale}   }}</h3>
                            <p class="font3 py-2 ">{{ $paracha[0]->{'content_'.$locale}   }}</p>

                    </div>
                    </div>


{{--                        SERVICES                --}}
                    @php $label = __('sections.services'); $url = route('services.index'); @endphp
                    <x-section :label="$label" :url="$url" />
                            <div class="flex flex-col mt-16  max-h-[120px] w-full flex-wrap">
                                @foreach( $services as $service )
                                    <p class="text-sm p-1 justify-between ">
                                        <a href="{{route('services.show', $service->id)}}" class="flex inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="text-green-400" class="bi bi-check-lg mx-2" viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                            </svg>
                                            {!!   $service->{'title_'.$locale} !!}
                                        </a>
                                    </p>
                                @endforeach
                            </div>
                    </div>

{{--                            NEWS                --}}
                    @php $label =  __('sections.announcements'); $url=route('novitas.index') @endphp
                    <x-section :label="$label" :url="$url" />
                        <div class="flex inline-flex">
                        @foreach($news as $new)

                             <a href="{{ route('novitas.show', $new->id) }}" class="w-[200px] h-[200px] rounded bg-yellow-100 shadow p-2 m-auto  ">
                                 <div class=" text-center border h-full py-[10%]">{{ $new->{'title_'.$locale} }}</div>
                             </a>
                        @endforeach
                        </div>
                    </div>



{{--                          EVENTS--}}
                    @php $label = __('sections.events'); $url=route('events.index'); @endphp
                    <x-section :label="$label" :url="$url" />
                    <div class="flex inline-flex">
                    @foreach($events as $event)

                            <a href="{{ route('events.show', $event->id) }}" class="px-4">
                                <p class="text-center">{{ $event->{'title_'.$locale} }}</p>
                                @if( env('APP_URL').$event->img )
                                    <img src="{{ env('APP_URL').$event->img }}" class="h-[200px] mx-auto mt-3 frame items-center">
                                @endif
                            </a>

                    @endforeach
                    </div>
                    </div>


{{--                        PHOTOS     --}}
                    @php $label = __('sections.photos'); $url = route('photos.index'); @endphp
                        <x-section :label="$label" :url="$url" class=""/>
                        @foreach($photos as $img)
                            <a href="{{route('photos.show',$img->id )}}">
                                <img src="{{env('APP_URL').$img->link}}" class="h-[100px] frame">
                            </a>
                        @endforeach
                    </div>


{{--                          ABOUT          --}}
                    @php $label = __('sections.about'); $url=url('about') @endphp
                    <x-section :label="$label" :url="$url" />

                        <p class="font3 py-5">{!!   $about[0]->{ 'content_'.$locale } !!}</p>
                    </div>


{{--                           PROGRAMME             --}}
                    @php $label = __('sections.program'); $url=url('program'); @endphp
                    <x-section :label="$label" :url="$url"/>
                        <p> {{ __('sections.select') }}</p>
                        <div class="flex inline-flex text-center mx-auto mt-5">
                            @foreach($classes as $id => $class)
                                <a class=" p-2 text-green-600" href="{{ route('classes.show', $id) }}">{{ $class }}</a>
                            @endforeach
                        </div>

                    </div>


{{--                        ACTIVITIES                --}}

                    @php $label = __('sections.activities'); $url=route('activities.index'); @endphp
                    <x-section :label="$label" :url="$url" />
                    <div class="flex inline-flex">
                        @foreach($activities as $act)
                            <a class="w-[200px] pb-5 text-center items-center mx-4 " href="{{ route('activities.show', $act->id) }}">
                                {{ $act->title_en }}
                                <div class="my-3">
                                @if( env('APP_URL').$act->img )
                                    <img src="{{ env('APP_URL').$act->img }}" class="h-[200px]  m-auto frame items-center ">
                                @endif
                                </div>
                                <p class="font3">{{ $act->content_en }}</p>
                            </a>
                        @endforeach
                    </div>
                    </div>

{{--                                INSCRIPTIONS--}}
                    @php $label = __('sections.enquiries'); $url=''; @endphp
                    <x-section :label="$label" :url="$url" />
                    <div class="mt-6 flex flex-col">
                        <a href="{{ route('emails.create') }}">{{ __('sections.reserve') }}</a>
                        <a href="{{ route('emails.create') }}">{{ __('sections.information') }}</a>
                        <a href="{{ route('candidates.create') }}">{{ __('sections.enroll') }}</a>
                        <a href="{{ route('emails.create') }}">{{ __('sections.booklet') }}</a>
                    </div>
                    </div>


{{--                     PARENTS       --}}
                    @php $label = __('sections.parents'); $url=url('toparents') @endphp
                    <x-section :label="$label" :url="$url"   />
                        <div CLASS="flex flex-col flex-wrap h-[120px] mt-6">
                        <a href="{{ url('aboutm') }}">{{ __('sections.esupport') }}</a>
                        <a href="{{ route('activities.index') }}">{{ __('sections.extractivities') }}</a>
                        <a href="{{ route('meals.index') }}">{{ __('sections.meals') }}</a>
                        <a href="{{ url('program') }} ">{{ __('sections.infoclass') }}</a>
                        <a href="{{ url('program') }}">{{ __('sections.program') }}</a>
                        <a href="{{ url('calendar') }}">{{ __('sections.calendar') }}</a>
                    </div>
                    </div>


    </div>
    </div>



{{-- JAVA SCRIPT--}}
{{--<a href="javascript:click();" class="p-2 rounded">click and get the prize</a>--}}

{{--<iframe src="{{url('/inner')}}" name="content" class="p-2 bg-red"></iframe>--}}
{{--                        <a href="javascript:c();">askinfo</a>--}}
{{--                        <a href="javascript:write();">write</a>--}}
{{--                        <a href="javascript:Name();">name</a>--}}



</main>

{{--   FOOTER --}}
<footer class="width-full">

    <section class="bg-[#444444] text-white flex inline-flex h-auto w-full font3 text-[17px] ">
        {{--        NAVIGATION--}}
        <div class="w-[25%] p-5 ml-12 items-center">
            <p>Navigation</p>
            <ul class="font5 text-[#6c9abf]  flex flex-col mt-3">
                @foreach($footer as $foot)
                    <a href="{{ env('APP_URL').'/'.$foot->link }}" class="">
                        <li class="py-1 pl-1 flex inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short mr-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg> {{ ucfirst($foot->{'title_'.$locale}) }}
                        </li>
                    </a>

                @endforeach
                    <li class="py-1 pl-1 flex inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short mr-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                        <a href=" {{ route('jobs.index') }}">Jobs</a>
                    </li>
                <li class="py-1 pl-1 flex inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short mr-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                        <a href="#">Site map</a>
                </li>

            </ul>
        </div>
        {{--        QUESTIONNAIRE--}}
        <div class="w-[20%] p-5 ml-12 items-center">
            {{ __('sections.question') }}
        </div>
        {{--        FINANCE--}}
        <div class="w-[20%] p-5 ml-12 items-center">
            {{ __('sections.finance') }}
            <ul class="flex flex-col mt-4">
                <li class="text-[#6c9abf] py-1 font5">{{ __('sections.bank') }}: Postfinance </li>
                <li class="text-[#6c9abf] py-1 font5">IBAN: CH49 0900 0000 1201 0388 8</li>
        </div>

        {{--        CONTACT--}}
        <div class="w-[24%] p-5 ml-12 items-center mx-auto">
            {{ __('sections.contact') }}
            <ul class="flex flex-col mt-4">
                <li class="flex inline-flex font5 items-center text-[#6c9abf] py-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill mr-2" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg> Centreville </li>
                <li class="flex inline-flex font5 items-center text-[#6c9abf] py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill mr-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg> 022 860 8613</li>
                <li class="flex inline-flex font5 items-center text-[#6c9abf] py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill mr-2" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                    </svg>
                    <a href="mailto:office@habadgeneve.ch">office@habadgeneve.ch</a>
                </li>
            </ul>
        </div>

    </section>
    <div class="flex justify-center  sm:items-center sm:justify-between bg-[#2b2b2b] font2 h-[36px]">
        <div class="text-center  text-gray-500 sm:text-left">
            <div class="flex items-center ml-4">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-[#7594ae]">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>

                <a href="#" class="ml-1 ">
                    Shop
                </a>

                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-[#7594ae]">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>

                <a href="https://www.habadgeneve.ch/" class="ml-1 ">
                    Sponsor
                </a>
                <a href="https://www.habadgeneve.ch/" class="ml-1 ">
                    OM Foundation
                </a>
            </div>
        </div>




        <div class="mx-4 text-center  text-gray-200 text-right  font2 ">
            for <span class="text-[#7594ae]">Ohalei Menahem School</span> v1.0 ©  <?=date('Y') ?>
        </div>
    </div>

</footer>

</body>

    <script src="{{ env('APP_URL').'/js/app.js' }}"></script>

    <script type="text/javascript">
        function click(){
            alert(frames.content.s);

        }

        function go(){

        }


        //opens new watsapp window
       function openWindow(){
            open("https://wa.me/41766377447");
        }


        {{--var url = "{{ route('changeLang') }}";--}}

        {{--$(".changeLang").change(function(){--}}
        {{--    window.location.href = url + "?lang="+ $(this).val();--}}
        {{--});--}}

    </script>







</html>
