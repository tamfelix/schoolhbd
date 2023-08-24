@extends('welcome')

@section('content')

    @php $title = __('sections.tostudents'); $link = url('tostudents') ;   @endphp
    <x-header :title="$title" :link="$link" />
    <section class="mx-auto w-[70%] mt-8 ">


{{--                    content--}}
                    <section class="text-gray-700  m-6">

                        <p class="text-xl">{{ __('sections.parentmessage') }}</p>
                        {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                    </section>




                    <div CLASS="flex flex-col flex-wrap h-[120px] mt-6 ml-4">
                        <a href="{{ url('aboutm') }}">- {{ __('sections.esupport') }}</a>
                        <a href="{{ route('events.index') }}">- {{ __('sections.extractivities') }}</a>
                        <a href="{{ route('meals.index') }}">- {{ __('sections.meals') }}</a>
                        <a href="{{ url('program') }} ">- {{ __('sections.infoclass') }}</a>
                        <a href="{{ url('program') }}">- {{ __('sections.program') }}</a>
                        <a href="{{ url('calendar') }}">- {{ __('sections.calendar') }}</a>
                    </div>
                </div>

        </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

       <x-endtag/>

@endsection

