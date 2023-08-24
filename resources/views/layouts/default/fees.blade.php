@extends('welcome')
@section('content')

    @php $title = ucfirst($fees[0]->{'title_'.app()->getLocale()}); $link = url('fees') ;   @endphp
    <x-header :title="$title" :link="$link" />

{{--    <section class="mx-auto w-[80%]  ">--}}


{{--        <section class="mx-auto flex inline-flex w-full  mt-10  ">--}}

{{--            <div class="w-full   text-[#2f506c]   px-3 mr-6 pb-0 pt-[12px] pl-0 bg-gray-50">--}}
{{--                title--}}
{{--                <a href="{{}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[11px] px-3">--}}
{{--                   {{  }}--}}
{{--                </a>--}}
{{--                content--}}
                <section class="text-gray-700 font3 m-6">
                    {!!  $fees[0]->{'content_'.app()->getLocale()} !!}
                </section>





                    <form class="ml-[20%] flex flex-col  " action="{{route('fees.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        {{--   message         --}}
                        @if(session()->has('success'))
                            <div class="alert alert-success w-[400px] h-[40px] p-2.5">{{session()->get('success')}}</div>
                        @endif


                        @error('name')

                        <div class="alert alert-primary w-[400px] h-[40px] p-2.5">{{$message}}</div>

                        @enderror
                        {{--   FORM         --}}

                        <x-contact class="items-center"></x-contact>
                        <x-submit class="" >
                                </x-submit>
                    </form>
    </section>
    </div>


            <x-rightmenu :sidemenu="$sidemenu" :director="$director" />

    <x-endtag/>

@endsection

