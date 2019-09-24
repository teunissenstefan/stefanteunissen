@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Card List
                        <a href="{{route('elements.index')}}" class="btn btn-danger float-right">Cancel</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::open(array('route' => array('cardlists.store')))}}
                            @method('POST')
                            @csrf

                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::label('title', 'Title:') }}
                                    {{ Form::text('title', null, array('class' => 'form-control '.($errors->has('title') ? ' is-invalid' : ''),'required')) }}
                                </div>
                                @if ($errors->has('title'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </small>
                                @endif
                            </div>

                            <br />
                            <button type="submit" class="btn btn-primary">Save</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
