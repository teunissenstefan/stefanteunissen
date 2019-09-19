<div class="text-center resume-section" id="pagelink-{{$element->identifier}}">
    <h1>Stefan-><span class="st-fg--dark-orange">{{$element->title}}</span></h1>

    @switch($element->elementable_type)
        @case("App\\CardList")
            <div class="row">
                @foreach($element->elementable->cardItems as $cardItem)
                    <div class="col-12 col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$cardItem->title}}</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="{{$cardItem->url}}" target="_blank" class="btn btn-primary"><i class="fa fa-code"></i> Code</a>
                                <a href="{{$cardItem->url}}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Demo</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @break

        @case("App\\Page")
        @default
            {!! $element->elementable->content !!}
    @endswitch

</div>