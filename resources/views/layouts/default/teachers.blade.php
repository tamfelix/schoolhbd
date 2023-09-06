@extends('welcome')

@section('content')

    @php $title = ucfirst($text[0]->{'title_'.app()->getLocale()}); $link = url('teachers') ;   @endphp
    <x-header :title="$title" :link="$link" />
{{--                content--}}
            <section class="text-gray-700 font3 m-6 ">
                {!!  $text[0]->{'content_'.app()->getLocale()} !!}
                <table>
                    @foreach( $teachers as $item)
                    <tr>
                        
                            <td><a href="{{ route('teachers.show', $item['id']) }} ">{{ $item['name'] }}</a></td>
                            <td class="px-3"><a href="{{ route('teachers.show', $item['id']) }} ">{{ $item['surname'] }}</a></td>
                            <td>{{ $item['role_'.app()->getLocale()] }}</td>
                        
                    </tr>
                @endforeach
                </table>
            </section>

    </div>
    </section>

            <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

    <x-endtag />

        {{--                    TEACHERS CAROUSEL--}}

        <x-carousel-component :teachers="$teachers" />

@endsection

