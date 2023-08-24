@extends('welcome')

@section('content')

    @php $title = ucfirst($text[0]->{'title_'.app()->getLocale()}); $link = url('enroll') ;   @endphp
    <x-header :title="$title" :link="$link" />


{{--            content--}}
                <section class="text-gray-700 font3 m-6 ">
                    {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                </section>


        <form class="m-4" action="{{route('candidates.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            {{--        message success--}}
            @if(session()->has('success'))
                <div class="alert alert-success w-[400px] h-[40px] p-2.5">{{session()->get('success')}}</div>
            @endif
            @error('name')

                <div class="alert alert-primary w-[400px] h-[40px] p-2.5">{{$message}}</div>

            @enderror
            {{--form        --}}
            <input class="px-2 py-1" name="name" value="{{ __('messages.studname')  }}">
            <input class="ml-2 px-2 py-1" name="surname" value="{{ __('messages.studsurname')  }}">
            @php $button = __('messages.submit'); @endphp
            <x-submit value="{{ __('messages.submit') }}" />
        </form>

    </form>



</div>
    </section>

            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

   <x-endtag/>

@endsection

