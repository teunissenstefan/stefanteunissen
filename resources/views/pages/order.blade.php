@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Change Order
                        <a href="{{route('pages.index')}}" class="btn btn-danger float-right mr-2">Cancel</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::open(array('route' => array('pages.updateOrder')))}}
                            @method('PATCH')
                            @csrf
                                <ol id='pageOrder'>
                                    @foreach($pages as $page)
                                        <li>{{$page->title}}<input type="hidden" name="pages[]" value="{{$page->id}}"/> </li>
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
