@extends('welcome')

@section('content')

    @php $title = ucfirst($text[0]->{'title_'.app()->getLocale()}); $link = url('enroll') ;   @endphp
    <x-header :title="$title" :link="$link" />


                {{--news section        --}}
                <section class=" bg-gray-50 p-5 m-6 mb-0 mt-8">
                    {{--   news1     --}}
                    {{ __('sections.soon') }}



{{--                        <p class="w-[300px] items-center">{{$events->links()}}</p>--}}
                </section>
        <div class=" h-[335px] mx-4 bg-gray-50"></div>

    </div>
    </section>
    {{--DIRECTORS--}}
    <div class=" ">
        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
<x-endtag/>
@endsection

