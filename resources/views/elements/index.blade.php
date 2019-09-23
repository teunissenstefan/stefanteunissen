@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Elements
                        <a href="{{route('pages.create')}}" class="btn btn-primary float-right">New Page</a>
                        <a href="{{route('cardlists.create')}}" class="btn btn-primary float-right mr-2">New Card List</a>
                        <a href="{{route('elements.order')}}" class="btn btn-warning float-right mr-2">Change Order</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Element</th>
                                    <th scope="col" style="width:100px;">Edit</th>
                                    <th scope="col" style="width:100px;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($elements->count() > 0)
                                    @foreach($elements as $element)
                                        <tr>
                                            <td scope="row">{{$element->title}}</td>
                                                @switch($element->elementable_type)
                                                    @case("App\\CardList")
                                                        <td style="width:100px;"><a class="btn btn-small btn-info float-right" href="{{route('cardlists.edit',['cardlist'=>$element->elementable->id])}}">Edit</a></td>
                                                    @break

                                                    @case("App\\Page")
                                                    @default
                                                        <td style="width:100px;"><a class="btn btn-small btn-info float-right" href="{{route('pages.edit',['page'=>$element->elementable->id])}}">Edit</a></td>
                                                @endswitch
                                            <td style="width:100px;"><form method="POST" action="{{route('elements.destroy',['element'=>$element->id])}}" accept-charset="UTF-8" class=" float-right">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input class="btn btn-small btn-danger" type="submit" value="Delete">
                                                </form></td>
                                        </tr>
                                    @endforeach
                                @else
                                    No elements
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
