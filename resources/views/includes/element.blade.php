<div class="text-center resume-section" id="pagelink-{{$element->identifier}}">
    <h1>Stefan->&#x200B;<span class="text-primary">{{$element->title}}</span></h1>

    @switch($element->elementable_type)
        @case("App\\CardList")
            <div class="row">
                @foreach($element->elementable->cardItems as $cardItem)
                    @if($cardItem->hidden==0)
                        <div class="col-12 col-md-4 mb-3 ml-auto mr-auto"> <!-- w-400 = width: 40rem (400px), mw-full = max-width: 100% -->
                            <div class="card p-0"> <!-- p-0 = padding: 0 -->
                                <img src="{{asset("storage/images/".$cardItem->image)}}" style="border-bottom:1px solid grey;" class="img-fluid rounded-top" alt="..."> <!-- rounded-top = rounded corners on the top -->
                                <!-- Nested content container inside card -->
                                <div class="content">
                                    <h2 class="content-title">
                                        {{$cardItem->title}}
                                    </h2>
                                    <p class="text-muted">
                                        {!! $cardItem->description !!}
                                    </p>
                                    @if($cardItem->btn_code != null) <a href="{{$cardItem->btn_code}}" target="_blank" class="btn btn-primary"><i class="fa fa-code"></i> Code</a> @endif
                                    @if($cardItem->btn_demo != null) <a href="{{$cardItem->btn_demo}}" target="_blank" class="btn btn-primary"><i class="fa fa-eye"></i> Demo</a> @endif
                                    @php($technologies = json_decode($cardItem->technologies))
                                    @if(count((array)$technologies) > 1 || (count((array)$technologies) > 0 && $technologies[0]!=null))
                                        <hr/>
                                        <h6>Technologiën</h6>
                                        @foreach($technologies as $technology)
                                            <span class="badge">{{$technology}}</span>
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
            @php(
                $vars = [
                    "age" => date_diff(date_create("24-06-1998"), date_create('now'))->y
                ]
            )
            @php($content = $element->elementable->content)
            @foreach($vars as $key=>$value)
                @php($content = str_replace("__".$key."__", $value, $content))
            @endforeach
            {!! $content !!}
    @endswitch

</div>
