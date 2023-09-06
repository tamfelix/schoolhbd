@extends('welcome')

@section('content')

    @php $title = "Photos"; $link = url('photos') ;   @endphp
    <x-header :title="$title" :link="$link" />


            <div class="flex inline-flex  w-[90%] mr-8 items-center py-8">
            @foreach($images as $unit)
                <div class="mx-auto">
                    <p class="text-center">{{ $unit->{'title_'.app()->getLocale()} }}</p>
                    @if(env('APP_URL').$unit->link)
                        <!--<a href="javascript:showImage('image')">-->
                            <img src="{{env('APP_URL').'/'.$unit->link}}" class="m-2 frame " id='image' onCLick="javascript:showImage('image')" >
                            <!--</a>-->
                    @endif
                    <p class="text-gray-700 font3 m-6">
                        {!!  $unit->{'content_'.app()->getLocale()} !!}
                    </p>
                </div>
                @endforeach
            </div>




    </section>
    </div>

                <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

           <x-endtag/>
           
           
           <script>function showImage($id){document.getElementById("image");}</script>

@endsection
