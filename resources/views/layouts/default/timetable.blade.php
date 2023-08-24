@extends('welcome')

@section('content')

    @php $title = __('sections.timetable'); $link = url('timetables') ;   @endphp
    <x-header :title="$title" :link="$link" />




        <section class="text-gray-700 font3 my-6"></section>

        <x-timetable :timetable="$timetable" class="items-center "></x-timetable>

    </section>
    </div>

    <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />
    <x-endtag />

@endsection
