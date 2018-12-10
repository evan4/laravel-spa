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
        css=""
        action="#"
        method="put"
        enctype="multypart/form-data"
        token=1234"">
            <div class="form-group">
                <label for="title">Ttile:</label>
                <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" id="description">
            </div>
            <button type="submit" class="btn btn-info">Save</button>
        </formcomponent>
    </modal>
    <modal name="edit" title="Edit">
        <formcomponent
         css=""
         action="#"
         method="put"
         enctype="multypart/form-data"
         token=1234"">
             <div class="form-group">
             <label for="title">Ttile: </label>
                 <input type="text" class="form-control" id="title" 
                    placeholder="Title" v-model="$store.state.item.title">
             </div>
             <div class="form-group">
                 <label for="description">Description:</label>
                 <input type="text" class="form-control" id="description"
                    placeholder="Description" v-model="$store.state.item.description">
             </div>
             <button type="submit" class="btn btn-info">Save</button>
         </formcomponent>
     </modal>
     <modal name="details" v-bind:title="$store.state.item.title">
        <p >@{{$store.state.item.description}}</p>
     </modal>
  </page>
@endsection
