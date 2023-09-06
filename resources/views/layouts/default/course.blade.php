@extends('welcome')

@section('content')
@php $classId = $class[0]['id'];
$link = route('classes.show', $classId); 
    $title = __('sections.program').' : '.$lesson[0]['title_'.app()->getLocale()]. ' '.$class[0]['title']; @endphp
<x-header :title="$title" :link="$link"/>


            <section class="text-gray-700 font3 m-6">
                @if($chapters==null)
                    <div class="py-3 text-lg">{{ __('sections.outline') }}</div>
                    <div class="pl-4">
                    @foreach($chapters as $item)
                        <p>{{ $item->{'title_'.app()->getLocale()} }}</p>
                    @endforeach
                    </div>
                
                
                
                
            <div class="mt-4"><i class="mt-8 text-green-800">{{ $class[0][ 'content_'.app()->getLocale() ] }}</i></div>
                @else
                    {{ __('sections.soon') }}
                @endif    
                
            <p class="mt-4">{{ __('sections.detailsm') }}.</p>   
            </section>


    </div>



</section>

                <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

           <x-endtag/>

@endsection
