@extends('welcome')

@section('content')


    @php $title = ucfirst(__('sections.projects')); $link = url('projects') ;   @endphp
    <x-header :title="$title" :link="$link" />

                    @foreach($range as $item)
                        <section class="text-gray-700 h3 m-6">
                            {{  $item->{'title_'.app()->getLocale()}  }}
                            @if($item->img)
                                <img src="{{ env('APP_URL').'/img/projects/'.$item->img ?? '' }}" class="h-[200px] my-6">
                            @endif

                                {{  $item->{'content_'.app()->getLocale()}  }}
                        </section>
                    @endforeach



                    <p class="ml-6">


                            {{ $range->links() }}

                    </p>

    </div>
</section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />


    <x-endtag />

        {{--                    TEACHERS CAROUSEL--}}

        <x-carousel-component :teachers="$teachers" />





@endsection

