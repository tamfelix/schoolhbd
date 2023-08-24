@extends('welcome')

@section('content')


    @php $title = ucfirst($program[0]->{'title_'.app()->getLocale() } ); $link = url('program') ;   @endphp
    <x-header :title="$title" :link="$link" />




                <section class="text-gray-700 font3 m-6">{!!  $program[0]->{'content_'.app()->getLocale()} !!}</section>

                <p class="mb-4">Selectionnez la classe pour visualiser le programme pour l'année scolaire:</p>

                    @foreach($range as $class =>$id)
                        <a href="{{ route('classes.show', $id) }}" class="text-green-600 px-2 ">
                            {{  $class  }}
                        </a>
                    @endforeach
            </div>


        </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director" class="" />


<x-endtag/>

@endsection

