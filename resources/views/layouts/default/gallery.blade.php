@extends('welcome')

@section('content')

    @php $title = "Photos"; $link = url('photos') ;   @endphp
    <x-header :title="$title" :link="$link" />


            <div class="flex inline-flex  w-[90%] mr-8 items-center py-8">
                <!--photo gallery-->
                <div class="mx-auto">      
                <div class="container">
                <div class="row py-3">
                    @foreach($images as $unit)
                        <div class="col-md-3 col-sm-4 col-6 py-2">
                            <a href="#galleryModal" data-large-src="{{env('APP_URL').'/'.$unit->link}}" data-toggle="modal">
                                <img src="{{ env('APP_URL').'/'.$unit->link }}" class="img-fluid img-thumbnail" alt=" {{ $unit->{'title_'.app()->getLocale()} }}" title="{{ $unit->{'title_'.app()->getLocale()} }}">
                            </a>
                        </div>
                    @endforeach
                </div>
                </div>

                    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="text-center mb-0"></h3>
                                        <button type="button" class="close float-right" aria-label="Close" data-dismiss="modal">
                                          <span aria-hidden="true">&#xD7;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-0 text-center bg-alt">
                                        <img src="//placehold.it/1200x700/222?text=..." id="galleryImage" class="loaded-image mx-auto img-fluid" >
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">OK</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                <!--end photo box-->
                            
                        
                    </p>
                </div>
              
            </div>


                {{ $images->links() }}

    </section>
    </div>

                <x-rightmenu :sidemenu="$sidemenu" :director="$director"  />

           <x-endtag/>
<script>
    $('#galleryModal').on('show.bs.modal', function (e) {
       $('#galleryImage').attr("src",$(e.relatedTarget).data("large-src"));
    });
</script>

@endsection
