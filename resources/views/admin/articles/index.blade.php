@extends('layouts.app')

@section('content')
  <page size="12">
    <panel title="List of Articles">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
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

  </page>
@endsection
