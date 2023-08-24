@extends('welcome')

@section('content')

    @php $title = ucfirst(__('sections.paracha')); $link = route('parachas.index') ;   @endphp
    <x-header :title="$title" :link="$link" />



                {{--title--}}
                    <h3 class="text-center py-4">{{ $text[0]->{'title_'.app()->getLocale()} }}</h3>

                {{--      content              --}}
                    <section class="text-gray-700 font3 m-6">
                        {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                    </section>




    </section>
                </div>

            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

     <x-endtag/>

@endsection

