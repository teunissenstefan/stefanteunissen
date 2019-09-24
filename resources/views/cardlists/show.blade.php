@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Card Items in <span class="font-weight-bold">{{$cardList->element->title}}</span>
                        <a href="{{route('carditems.create')}}" class="btn btn-primary float-right mr-2">New Card Item</a>
                        <a href="{{route('carditems.order',['cardlist'=>$cardList->id])}}" class="btn btn-warning float-right mr-2">Change Order</a>
                        <a href="{{route('cardlists.edit',['cardlist'=>$cardList->id])}}" class="btn btn-primary float-right mr-2">Change Title</a>
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
                                <th scope="col">Card Item</th>
                                <th scope="col" style="width:100px;">Edit</th>
                                <th scope="col" style="width:100px;">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cardList->cardItems->count() > 0)
                                @foreach($cardList->cardItems as $cardItem)
                                    <tr>
                                        <td scope="row">{{$cardItem->title}}</td>
                                        <td style="width:100px;"><a class="btn btn-small btn-info float-right" href="{{route('carditems.edit',['carditem'=>$cardItem->id])}}">Edit</a></td>
                                        <td style="width:100px;"><form method="POST" action="{{route('carditems.destroy',['carditem'=>$cardItem->id])}}" accept-charset="UTF-8" class=" float-right">
                                                @csrf
                                                @method("DELETE")
                                                <input class="btn btn-small btn-danger" type="submit" value="Delete">
                                            </form></td>
                                    </tr>
                                @endforeach
                            @else
                                No card items
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
