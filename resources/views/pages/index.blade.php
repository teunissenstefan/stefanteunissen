@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Pages
                        <a href="{{route('pages.create')}}" class="btn btn-primary float-right">New Page</a>
                        <a href="{{route('pages.order')}}" class="btn btn-warning float-right mr-2">Change Order</a>
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
                                    <th scope="col">Page</th>
                                    <th scope="col" style="width:100px;">Bewerken</th>
                                    <th scope="col" style="width:100px;">Verwijderen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pages->count() > 0)
                                    @foreach($pages as $page)
                                        <tr>
                                            <td scope="row">{{$page->title}}</td>
                                            <td style="width:100px;"><a class="btn btn-small btn-info float-right" href="{{route('pages.edit',['page'=>$page->id])}}">Bewerk</a></td>
                                            <td style="width:100px;"><form method="POST" action="{{route('pages.destroy',['page'=>$page->id])}}" accept-charset="UTF-8" class=" float-right">
                                                    @csrf
                                                    @method("DELETE")
                                                    <input class="btn btn-small btn-danger" type="submit" value="Verwijder">
                                                </form></td>
                                        </tr>
                                    @endforeach
                                @else
                                    No pages
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
