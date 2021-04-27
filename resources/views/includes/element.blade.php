<div class="text-center resume-section" id="pagelink-{{$element->identifier}}">
    <h1>Stefan->&#x200B;<span class="st-fg--dark-orange">{{$element->title}}</span></h1>

    @switch($element->elementable_type)
        @case("App\\CardList")
            <div class="row" data-masonry='{"percentPosition": true }'>
                @foreach($element->elementable->cardItems as $cardItem)
                    @if($cardItem->hidden==0)
                        <div class="col-12 col-md-4 mb-3 ml-auto mr-auto">
                            <div class="card" style="border:1px solid rgba(0, 0, 0, .5);">
                                <a href="{{asset("storage/images/".$cardItem->image)}}" data-toggle="lightbox">
                                    <img class="card-img-top" src="{{asset("storage/images/".$cardItem->image)}}" style="border-bottom:1px solid grey;" alt="Card image cap">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$cardItem->title}}</h5>
                                    <p class="card-text">{!! $cardItem->description !!}</p>
                                    @if($cardItem->btn_code != null) <a href="{{$cardItem->btn_code}}" target="_blank" class="btn btn-primary btn-orange"><i class="fa fa-code"></i> Code</a> @endif
                                    @if($cardItem->btn_demo != null) <a href="{{$cardItem->btn_demo}}" target="_blank" class="btn btn-primary btn-orange"><i class="fa fa-eye"></i> Demo</a> @endif
                                    @php($technologies = json_decode($cardItem->technologies))
                                    @if(count((array)$technologies) > 1 || (count((array)$technologies) > 0 && $technologies[0]!=null))
                                        <hr/>
                                        <h6>Technologiën</h6>
                                        @foreach($technologies as $technology)
                                            <span class="badge badge-secondary">{{$technology}}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @break

        @case("App\\Page")
        @default
            {!! $element->elementable->content !!}
    @endswitch

</div>
