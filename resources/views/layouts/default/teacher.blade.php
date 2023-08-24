@extends('welcome')

@section('content')


    @php $title = ucfirst($text[0]->{'title_'.app()->getLocale()}); $link = url('teachers') ;   @endphp
    <x-header :title="$title" :link="$link" />


                    <section class="text-gray-700 h3 m-6">
                        <img src="{{ env('APP_URL').'/img/teachers/'.$enseignant[0]->img ?? '' }}" class="h-[200px] my-6">
                        {{  $enseignant[0]->name.' '.  $enseignant[0]->surname  ?? ''}}
                    </section>




                    <p class="ml-6">

                        <a href="{{url('teachers')}}" class="text-green-600">
                            {{$enseignant[0]->{'role_'.app()->getLocale()} ?? ''}}
                        </a>
                    </p>

    </div>
</section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />


    <x-endtag />

        {{--                    TEACHERS CAROUSEL--}}

        <x-carousel-component :teachers="$teachers" />





@endsection

