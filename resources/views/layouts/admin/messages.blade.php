@extends('dashboard')

@section('content')
    <main class="flex inline-flex w-full  ml-10 mt-10 mr-0 pr-0">

<div class="w-[80%] mr-5   text-[#2f506c] p-3 pt-0  pb-0 pt-[12px] pl-0">
    <a href="{{url('messages')}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[11px] px-3">
        Messages
    </a>
    <section class="text-gray-700 font3 m-6 flex flex-col">
        <table class="bg-gray-50">
        @foreach($messages as $text)
                <tr class="border">
                    <td class="border p-2">{{  $text->subject }} </td>
                    <td class="border p-2">{{$text->created_at}}</td>
                </tr>
        @endforeach

        </table>
    </section>


</div>
@endsection

