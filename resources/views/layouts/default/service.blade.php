@extends('welcome')

@section('content')

    @php $title = __('sections.services'); $link = route('services.index') ;   @endphp
    <x-header :title="$title" :link="$link" />
    <section class="mx-auto w-[70%] mt-8 ">


{{--                    content--}}
                    <section class="text-gray-700  m-6">


                    </section>




                    <div CLASS="   mt-6 ml-4">
                    @foreach($range as $item)

                        <a href="{{ route('services.show', $item->id) }}" class="text-xl"> {{ $item->{'title_'.app()->getLocale()} }}</a>
                            <p class="ml-12">{{ $item->description }}</p>


                    @endforeach
                    </div>
                </div>

        </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

       <x-endtag/>

@endsection

