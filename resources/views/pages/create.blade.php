@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Page</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::open(array('route' => array('pages.store')))}}
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('title', 'Title:') }}
                                {{ Form::text('title', null, array('class' => 'form-control '.($errors->has('title') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('title'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('identifier', 'Identifier:') }}
                                {{ Form::text('identifier', null, array('class' => 'form-control '.($errors->has('identifier') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('identifier'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('identifier') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('content', 'Content:') }}
                                {{ Form::textarea('content', null, array('class' => 'form-control '.($errors->has('content') ? ' is-invalid' : ''),'required')) }}
                                @if ($errors->has('content'))
                                    <small class="text-danger" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </small>
                                @endif
                            </div>
                        </div>
                        <br />
                        <button type="submit" class="btn btn-primary">Add</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
