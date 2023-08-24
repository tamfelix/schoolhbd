@extends('welcome')

@section('content')


    @php $title =  __('sections.supplies'); $link = route('novitas.index') ;   @endphp
    <x-header :title="$title" :link="$link" />


                @foreach($item as $article)
                {{--news section        --}}
                <section class="my-8 bg-gray-50 p-5  mr-5">
                    {{--   news1     --}}
                            <div class="">
                                <div class="flex flex-col items-center">

                                    <div class="font3 text-xl text-[#7fa7cb] pl-4 pb-4">
                                        {{ $article->{'title_'.app()->getLocale()} }}
                                    </div>
                                    @if ($article->photo)
                                        <img src="{{ env('APP_URL').'/img/news/'.$article->photo }}" class="w-[400px] h-auto  m-4 pb-4">
                                    @endif
                                </div>
                                <p class="font3 pl-12 text-gray-800 py-4">
                                    {{ $article->{'content_'.app()->getLocale()} }}
                                </p>

                                <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                                    <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
{{--                                        DATE--}}
                                        <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                                        <p class=" ">{{ substr($article->created_at, 0, 10)}}</p>

{{--                                        LIKES--}}
                                        <i class="fas fa-comments fa-lg  p-3 pr-1 pl-4 text-[#2f506c]"></i>
                                        <p class="pr-4">{{$article->likes}}</p>


{{--                                        VIEWS--}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="ml-1 bi bi-eye-fill " viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                        <p class="pl-1 ">{{$article->views}}</p>
                                    </div>
                                </div>
                            </div>
                      @endforeach
                        <p class="w-[300px] items-center">{{ $item->links() }}</p>
                </section>
    </div>
</section>
    {{--DIRECTORS--}}
    <div class=" ">
        <x-rightmenu :sidemenu="$sidemenu" :director="$director" class=""/>
    </div>

<x-endtag/>
@endsection

