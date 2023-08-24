

<section class=" font3 text-[#2f506c] text-lg mt-8 bg-gray-50 h-[230px]" >
    <p class="border-t-2 border-[#6091ba] pt-[15px] px-3 mt-4 pl-4 p-4 w-[200px]">
        Our team</p>

<div class="carousel slide "   data-ride="carousel" >

    <div class="carousel-inner w-[80%] ml-28 mb-4" >

        @foreach($teachers as $teacher)
        <div class="carousel-item active" style="width: auto; height: 100px; margin: 0 auto;">
            <a class="product-link" href="{{url('teacher', $teacher['id'])}}" target="_blank">
                <img class="product-img w-auto h-[100px] m-0 d-block" src="{{env('APP_URL' )}}/img/teachers/{{$teacher['img']}}">
            </a></div>


        @endforeach
</div>
    <button class="carousel-control-prev " type="button" data-target="#carouselExampleControls" data-slide="prev">
        <span class="carousel-control-prev-icon bg-gray-300" aria-hidden="true"></span>
        <span class="sr-only text-green-600">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
        <span class="carousel-control-next-icon bg-gray-300" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>


</div>
</section>
