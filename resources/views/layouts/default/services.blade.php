@extends('welcome')

@section('content')

    @php $title = __('sections.services'); $link = route('services.index') ;   @endphp
    <x-header :title="$title" :link="$link" />
    <section class="mx-auto w-[70%] mt-8 ">


{{--                    content--}}
                    <section class="text-gray-700  m-6">

                        <p class="text-xl">{{ __('sections.parentmessage') }}</p>
                        {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                    </section>




                    <div CLASS="   mt-6 ml-4">
                    @foreach($services as $item)

                        <a href="{{ route('services.show', $item->id) }}">- {{ $item->{'title_'.app()->getLocale()} }}</a>
                            <p>{{ $item->description }}</p>


                    @endforeach
                    </div>
                </div>

        </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

       <x-endtag/>

@endsection

