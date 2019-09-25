@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Change Order for Card Items
                        <a href="{{route('cardlists.show',['cardlist'=>$cardList->id])}}" class="btn btn-danger float-right mr-2">Cancel</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::open(array('url' => route('carditems.updateOrder',['cardlist'=>$cardList])))}}
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="cardlistid" value="{{$cardList->id}}"/>
                        <ol id='elementOrder'>
                            @foreach($cardList->cardItems as $cardItem)
                                <li>{{$cardItem->title}}<input type="hidden" name="carditems[]" value="{{$cardItem->id}}"/> </li>
                            @endforeach
                        </ol>
                        <button type="submit" class="btn btn-success">Save</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection