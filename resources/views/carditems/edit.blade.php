@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Card Item in <span class="font-weight-bold">{{$cardItem->cardList->element->title}}</span>
                        <a href="{{route('cardlists.show',['cardlist'=>$cardItem->cardList->id])}}" class="btn btn-danger float-right">Cancel</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::model($cardItem ,array('route' => array('carditems.update','carditem'=>$cardItem),'files' => true))}}
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('title', 'Title*:') }}
                                {{ Form::text('title', null, array('class' => 'form-control '.($errors->has('title') ? ' is-invalid' : ''),'required')) }}
                            </div>
                            @if ($errors->has('title'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('description', 'Description*:') }}
                                {{ Form::text('description', null, array('class' => 'form-control '.($errors->has('description') ? ' is-invalid' : ''),'required')) }}
                            </div>
                            @if ($errors->has('description'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Current image:
                                <a href="{{asset("storage/images/".$cardItem->image)}}" data-toggle="lightbox">
                                    <img class="card-img-top" src="{{asset("storage/images/".$cardItem->image)}}" alt="Card image cap">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('image', 'Image:') }}
                                {{ Form::file('image', array('class' => 'form-control '.($errors->has('image') ? ' is-invalid' : ''))) }}
                            </div>
                            @if ($errors->has('image'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('btn_code', 'Code URL:') }}
                                {{ Form::text('btn_code', null, array('class' => 'form-control '.($errors->has('btn_code') ? ' is-invalid' : ''))) }}
                            </div>
                            @if ($errors->has('btn_code'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('btn_code') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('btn_demo', 'Demo URL:') }}
                                {{ Form::text('btn_demo', null, array('class' => 'form-control '.($errors->has('btn_demo') ? ' is-invalid' : ''))) }}
                            </div>
                            @if ($errors->has('btn_demo'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('btn_demo') }}</strong>
                                </small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{ Form::label('technologies', 'Technologies (comma delimited):') }}
                                {{ Form::text('technologies', null, array('class' => 'form-control '.($errors->has('technologies') ? ' is-invalid' : ''))) }}
                            </div>
                            @if ($errors->has('technologies'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('technologies') }}</strong>
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
