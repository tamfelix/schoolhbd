@extends('welcome')

@section('content')
@php $link = url('activities'); $title = ucfirst($text[0]->{'title_'.app()->getLocale()});@endphp
<x-header :link="$link" :title="$title" />

{{--    <section class="mx-auto w-[70%] mt-8 ">--}}

{{--        <main class="flex inline-flex w-full  mt-10 mr-0 pr-0">--}}

{{--            <div class="w-[100%]  mr-5  text-[#2f506c]  p-3  pt-[12px] pl-0">--}}
{{--                <a href="{{}}" class="font3 text-[#2f506c] text-lg border-t-2 border-[#6091ba] pt-[11px] px-3">--}}
{{--                    {{  }}--}}
{{--                </a>--}}

                @foreach($activities as $new)

                    {{--   news1     --}}
                    <div class="py-4">
                        <div class="flex flex-col items-center">
{{--                            title--}}
                            <div class="font3 text-xl text-[#7fa7cb] pl-4">
                                <a href="{{ route('activities.show', $new->id) }}">{{ $new->{'title_'.app()->getLocale()} }}</a>
                            </div>
                            @if(env('APP_URL').$new->img)
                                <img src="{{ env('APP_URL').'/'.$new->img }}" class="w-[400px] h-auto frame m-4">
                            @endif
                        </div>
                        <p class="font3 pl-12 text-gray-800">
                            {{ $new->{'content_'.app()->getLocale()} }}
                        </p>

                        <div class="flex inline-flex font4 text-gray-600 py-4 w-full justify-between ">
                            <div class="flex inline-flex font4 text-gray-600  w-[70%] items-center">
                                <i class="fa fa-calendar fa-lg   pr-2 pl-12 text-[text-gray-500]"></i>
                                <p class=" ">{{ substr($new->created_at, 0, 10)}}</p>


                                <form action ="{{ route('alike') }}" method="GET">
                                    <input class="hidden" name="id" value="{{ $new->id }}"/>
                                    <button type="submit" name="" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up ml-4 mr-1" viewBox="0 0 16 16">
                                            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                        </svg>
                                    </button>

                                </form>
                                <p>{{ $new->likes }}</p>

                                {{--                                views--}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="ml-3 bi bi-eye-fill " viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                                <p class="px-1">{{ $new->views }}</p>

                            </div>
                        </div>
                    </div>

{{--                <a class=" w-[100px] text-blue-400 inline-flex items-center" href="">--}}
{{--                    <div>Previous</div>  </a>--}}

{{--                    <a class=" w-[100px] text-blue-400 inline-flex items-center" href=""><div class=" ">Next</div>--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right text-blue-400" viewBox="0 0 16 16">--}}
{{--                        <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>--}}
{{--                    </svg>--}}
{{--                </a>--}}




@endforeach
                <p class="w-[300px] items-center">{{$activities->links()}}</p>




             </div>
             </section>
            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

<x-endtag/>



@endsection

