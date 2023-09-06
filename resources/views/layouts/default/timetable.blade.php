@extends('welcome')

@section('content')

    @php $title = __('sections.timetable'); $link = url('timetables') ;   @endphp
    <x-header :title="$title" :link="$link" />




        <section class="text-gray-700 font3 my-6 rounded-xl border p-4 w-fit">

        <table class="w-[400px] h-auto pl-5  mx-3 mt-4  items-center " >
            <tbody class="font4 pl-6 uppercase text-gray-600">
             @foreach($lessons as $time => $number)
                 <tr class="font4   py-2 border-b ">
                     <td class = "w-[30%] px-1 py-1">
                         @if($number == 'r' )
                         {{ __('sections.break') }}
                         @else
                         {{$number}} {{ __('sections.lesson') }}
                         @endif
                         </td>
                    <td class = "w-[35%] font4">{{$time}}</td>
                </tr>
            @endforeach
    </tbody>
</table>
</section>


    <p class="mt-8">{{ __('sections.detailsm') }}.</p>    

    </section>
    </div>

    <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />
    <x-endtag />

@endsection
