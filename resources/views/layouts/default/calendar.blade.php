@extends('welcome')

@section('content')
@php $link = url('calendar'); $title = $calendar[0]->{'title_'.app()->getLocale() }; @endphp
    <x-header :title="$title" :link="$link"/>


        <section class="text-gray-700 font3 m-6">

            {{ __('sections.soon') }}
        </section>


    </div>
</section>

            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

        <x-endtag/>


@endsection

