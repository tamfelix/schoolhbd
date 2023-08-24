@extends('welcome')

@section('content')

    @php $title = ucfirst($text[0]->{'title_'.app()->getLocale()}); $link = url('partners') ;   @endphp
    <x-header :title="$title" :link="$link" />


                {{--      content              --}}
                    <section class="text-gray-700 font3 m-6">
                        {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                    </section>




                </div>
    </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

       <x-endtag/>

@endsection

