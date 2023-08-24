@extends('welcome')

@section('content')


    @php $title = __('sections.suppliers'); $link = url('suppliers') ;   @endphp
    <x-header :title="$title" :link="$link" />


            {{--  content          --}}
            <section class="text-gray-700 font3 m-6">
                {!!  $text[0]->{'content_'.app()->getLocale()} !!}
            </section>

        </div>

    </section>
        <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

<x-endtag />

@endsection

