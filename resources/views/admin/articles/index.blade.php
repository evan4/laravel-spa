@extends('layouts.app')

@section('content')
  <page size="12">
    <panel title="List of Articles">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
            
        <table-list
            v-bind:titles="['#', 'Títle', 'Description']"
            v-bind:items="{{$listArticles}}"
            create="#create"
            details="#details"
            edit="#edit"
            deleted="#delete"
            order="desc"
            order-col="1"
            token="855566"
            modal="sim"
            >
        </table-list>

    </panel>
    
    <modal name="add" title="Create">
       <formcomponent
       id="formAdd"
        css=""
        action="{{route('articles.store')}}"
        method="post"
        enctype=""
        token="{{csrf_token()}}">
            <div class="form-group">
                <label for="title">Ttile:</label>
                <input type="text" class="form-control" id="title" name="title"
                    placeholder="Title">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Description">
            </div>
            <div class="form-group">
                <label for="content">Conten:</label>
                <textarea class="form-control" id="conten" 
                    name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="datetime-local" class="form-control" id="data"
                    name="data">
            </div>
        </formcomponent>

        <span slot="buttons">
            <button  form="formAdd"
                type="submit" class="btn btn-info">Save</button>
         </span>

    </modal>

    <modal name="edit" title="Edit">
        <formcomponent
        id="formEdit"
         css=""
         action="{{route('articles.store')}}"
         method="put"
         enctype=""
        token="{{csrf_token()}}">
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
                <textarea class="form-control" id="conten" 
                    name="content"
                    v-model="$store.state.item.content"></textarea>
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="datetime-local" class="form-control" id="data"
                    name="data"
                   v-model="$store.state.item.data">
            </div>
         </formcomponent>
         
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
