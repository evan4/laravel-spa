@extends('layouts.app')

@section('content')
   <page size="10">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
        <panel title="Dashboard">
            <div class="row">
                <div class="col-md-4">
                    <box
                        qtd="80"
                        title="Articles"
                        url="{{ route('articles.index') }}"
                        color="orange"
                        icon="ion ion-pie-graph"></box>
                </div>
                <div class="col-md-4">
                    <box
                        qtd="1500"
                        title="Users"
                        url="{{ route('users.index') }}"
                        color="blue"
                        icon="ion ion-person-stalker"></box>
                </div>
                <div class="col-md-4">
                    <box
                        qtd="3"
                        title="Authors"
                        url="#"
                        color="red"
                        icon="ion ion-person"></box>
                </div>
            </div>
        </panel>
   </page>
@endsection
