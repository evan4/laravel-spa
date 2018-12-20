@extends('layouts.app')

@section('content')
   <page size="10">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
        <panel title="Dashboard">
            <div class="row">
                <div class="col-md-4">
                    <box
                        qtd="{{$totalUsers}}"
                        title="Articles"
                        url="{{ route('articles.index') }}"
                        color="orange"
                        icon="ion ion-pie-graph"></box>
                </div>
                <div class="col-md-4">
                    <box
                        qtd="{{$totalArticles}}"
                        title="Users"
                        url="{{ route('users.index') }}"
                        color="blue"
                        icon="ion ion-person-stalker"></box>
                </div>
                <div class="col-md-4">
                    <box
                        qtd="{{$totalAuthors}}"
                        title="Authors"
                        url="{{ route('authors.index') }}"
                        color="red"
                        icon="ion ion-person"></box>
                </div>
                <div class="col-md-4">
                    <box
                        qtd="{{$totalAdmins}}"
                        title="Admins"
                        url="{{ route('adm.index') }}"
                        color="green"
                        icon="ion ion-person"></box>
                </div>
            </div>
        </panel>
   </page>
@endsection
