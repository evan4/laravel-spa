@extends('layouts.app') 
@section('content')
<page size="12">
    <panel>
            <h2 class="text-center">{{$article->title}}</h2>
            <h4 class="text-center">{{$article->description}}</h4>
            <small>{{$article->user->name}} - {{ date('d/m/Y',strtotime($article->data) ) }}</small>
            <div>{!! $article->content !!}</div>
    </panel>
</page>
@endsection