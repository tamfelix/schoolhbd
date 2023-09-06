@extends('welcome')

@section('content')
@php $link = route('classes.index'); $title = __('sections.class'); @endphp
<x-header :title="$title" :link="$link"/>


            <section class="text-gray-700 font3 m-6">
                    @if($classes)
                        @foreach($classes as $item => $id)
                            <a href="{{ route('classes.show', $item) }}">{{ $id }}</a>
                        @endforeach
                    @endif
            </section>


    </div>



</section>

                <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

           <x-endtag/>

@endsection
