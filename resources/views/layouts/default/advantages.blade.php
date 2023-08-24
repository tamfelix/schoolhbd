@extends('welcome')

@section('content')
    @php $link = url('advantages'); $title = ucfirst($advantages[0]->{'title_'.app()->getLocale()}); @endphp
    <x-header :link="$link" :title="$title"/>


            <section class="text-gray-700 font3 m-6 py-2 max-h-fit">
                {!!  $advantages[0]->{'content_'.app()->getLocale()} !!}
            </section>

        </div>
    </section>

        <x-rightmenu :sidemenu="$sidemenu" :director="$director" />


<x-endtag/>

@endsection
