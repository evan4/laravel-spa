@extends('layouts.app') 
@section('content')
<page size="12">
    <panel title="Articles">
            <small>{{$article->data}} - {{$article->author}}</small>
            <h5>{{$article->title}}</h5>
            <div>{{$article->description}}</div>
    </panel>
</page>
@endsection