@extends('welcome')

@section('content')
@php $link = route('classes.index'); $title = __('sections.class').' '.$class[0]['title']; @endphp
<x-header :title="$title" :link="$link"/>


            <section class="text-gray-700 font3 m-6">
                @if($courses)
                    @foreach($courses as $item)
                        <p><a href="{{ route('courses.show', $item->id) }}">{{ $item->{'title_'.app()->getLocale()} }}</a></p>
                    @endforeach
                
                @else
                    {{ __('sections.soon') }}
                @endif    
            </section>


    </div>



</section>

                <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

           <x-endtag/>

@endsection
