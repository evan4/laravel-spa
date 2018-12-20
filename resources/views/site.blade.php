@extends('layouts.app') 
@section('content')
<page size="12">
    <panel title="Articles">
        <div class="row justify-content-md-center">
            <form class="form-inline mb-2 mt-2" action="{{route('site')}}" method="get" >
                <input type="search" class="form-control" name="search" 
                    placeholder="Search" value="{{isset($search) ? $search : ""}}">
                <button class="btn btn-info">Search</button>
            </form>
        </div>
        <div class="row">
            @foreach($list as $key => $value)
                <articlescard
                title="t{{$value->title}}"
                description="t{{$value->description}}" 
                link="{{route('article', [$value->id, str_slug($value->title) ] )}}" 
                image="{{ asset('img/ISyjpy15451956461816_b.jpg') }}"
                data="{{$value->data}}"
                author="{{$value->author}}"
                sm="4"
                ></articlescard>
           @endforeach
        </div>
        {{$list->links()}}
    </panel>
</page>
@endsection