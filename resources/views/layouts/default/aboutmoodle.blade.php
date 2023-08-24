@extends('welcome')

@section('content')
@php $link = url('aboutm') ; $title = $text[0]->{'title_'.app()->getLocale()}; @endphp
<x-header :link="$link" :title="$title" />


       <section class="text-gray-700 font3 m-6">
              <a class="text-green-600" href="{{ route('emails.create') }}">
                  {!!  $text[0]->{'content_'.app()->getLocale()} !!}
              </a>
       </section>




                </div>
            </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />


    <x-endtag></x-endtag>

@endsection

