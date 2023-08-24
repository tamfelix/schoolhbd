@extends('welcome')

@section('content')

    @php $title = __('sections.contact'); $link = route('emails.create') ;   @endphp
    <x-header :title="$title" :link="$link" />

                <p class="py-8 pr-4">
                    {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                </p>



                <form class="w-full " action="{{route('emails.store')}}" method="POST" enctype="multipart/form-data">
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
                    <x-contact></x-contact>
                    {{--            <button type="submit" >--}}
                    <x-submit class="" type="submit"></x-submit>

                </form>


            </div>
        </section>



            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

       <x-endtag/>


@endsection

