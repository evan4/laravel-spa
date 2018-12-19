@extends('layouts.app')

@section('content')
    <page size="12">
        @if($errors->all())
            
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach($errors->all() as $key => $value)
                <li>
                    <strong>{{$value}}</strong>
                    
                </li>
                @endforeach
            </div>
        @endif
      
    <panel title="List of Articles">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
            
        <table-list
            v-bind:titles="['#', 'Títle', 'Description', 'Author', 'data']"
            v-bind:items="{{json_encode($listArticles)}}"
            create="#create"
            details="/admin/articles/"
            edited="/admin/articles/"
            deleted="/admin/articles/"
            order="desc"
            order-col="0"
            token="{{csrf_token()}}"
            modal="sim"
            >
        </table-list>
        {{$listArticles->links()}}
    </panel>
    
    <modal name="add" title="Create">
       <form-component
       id="formAdd"
        css=""
        action="{{route('articles.store')}}"
        method="post"
        enctype=""
        token="{{csrf_token()}}">
            <div class="form-group">
                <label for="title-create">Ttile:</label>
                <input type="text" class="form-control" id="title-create" name="title"
                placeholder="Title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="description-create">Description:</label>
                <input type="text" class="form-control" id="description-create" name="description"
                    placeholder="Description" value="{{old('description')}}">
            </div>
            <div class="form-group">
                <label for="content-create">Content:</label>
                <vue-ckeditor 
                    id="content-create" 
                    name="content"
                    value="{{old('content')}}" 
                    v-bind:config="{
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
                        ],
                        height: 300
                      }" />
            </div>
            <div class="form-group">
                <label for="data-create">Data:</label>
                <input type="date" class="form-control" id="data-create"
                    name="data" value="{{ old('data') }}">
            </div>
        </form-component>

        <span slot="buttons">
            <button  form="formAdd"
                type="submit" class="btn btn-info">Save</button>
         </span>

    </modal>

    <modal name="edit" title="Edit">
        <form-component
        id="formEdit"
         css=""
         v-bind:action="'/admin/articles/'+$store.state.item.id"
         method="put"
         enctype=""
         token="{{ csrf_token() }}">
             <div class="form-group">
             <label for="title">Ttile: </label>
                 <input type="text" class="form-control" id="title" 
                    name="title"
                    placeholder="Title" v-model="$store.state.item.title">
             </div>
             <div class="form-group">
                 <label for="description">Description:</label>
                 <input type="text" class="form-control" id="description" name="description"
                    placeholder="Description" v-model="$store.state.item.description">
             </div>
             <div class="form-group">
                <label for="content">Conten:</label>
                <vue-ckeditor 
                    id="content" 
                    name="content"
                    v-model="$store.state.item.content"
                    v-bind:config="{
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
                        ],
                        height: 300
                      }" />
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data"
                    name="data"
                   v-model="$store.state.item.data">
            </div>
            
         </form-component>
         
         <span slot="buttons">
            <button  form="formEdit"
                type="submit" class="btn btn-info">Save</button>
         </span>
         
     </modal>

     <modal name="details" v-bind:title="$store.state.item.title">
        <p >@{{$store.state.item.description}}</p>
     </modal>

  </page>
@endsection
