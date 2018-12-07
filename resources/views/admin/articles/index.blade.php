@extends('layouts.app')

@section('content')
  <page size="12">
    <panel title="List of Articles">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
        
        <modallink
            type="link"
            name="myModalTest"
            title="Create"
            css="">
        </modallink>
        <table-list
            v-bind:titles="['#', 'Títle', 'Description']"
            v-bind:items="[
                [1,'PHP', 'course php'],
                [2,'Vue.js', 'course Vue.js'],
            ]"
            create="#create"
            details="#details"
            edit="#edit"
            deleted="#delete"
            order="desc"
            order-col="1"
            token="855566"
            >
        </table-list>

    </panel>
    <modal name="myModalTest" title="Add">
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
            <button type="submit" class="btn btn-info">Add</button>
        </formcomponent>
    </modal>
  </page>
@endsection
