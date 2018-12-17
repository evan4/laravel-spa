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
      
    <panel title="List of users">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
            
        <table-list
            v-bind:titles="['#', 'Name', 'Email']"
            v-bind:items="{{json_encode($listModel)}}"
            create="#create"
            details="/admin/users/"
            edited="/admin/users/"
            deleted="/admin/users/"
            order="desc"
            order-col="1"
            token="{{csrf_token()}}"
            modal="sim"
            >
        </table-list>
        {{$listModel->links()}}
    </panel>
    
    <modal name="add" title="Create">
       <formcomponent
       id="formAdd"
        css=""
        action="{{route('users.store')}}"
        method="post"
        enctype=""
        token="{{csrf_token()}}">
            <div class="form-group">
                <label for="name-create">Name:</label>
                <input type="text" class="form-control" id="name-create" name="name"
                placeholder="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email-create">Email:</label>
                <input type="email" class="form-control" id="email-create" name="email"
                    placeholder="Email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="password-create">Password:</label>
                <input type="password" class="form-control" id="password-create"
                    name="password" value="{{ old('password') }}">
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
         v-bind:action="'/admin/users/'+$store.state.item.id"
         method="put"
         enctype=""
         token="{{ csrf_token() }}">
             <div class="form-group">
             <label for="name">Name: </label>
                 <input type="text" class="form-control" id="name" 
                    name="name"
                    placeholder="Name" v-model="$store.state.item.name">
             </div>
             <div class="form-group">
                 <label for="email">Email:</label>
                 <input type="email" class="form-control" id="email" name="email"
                    placeholder="Email" v-model="$store.state.item.email">
             </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password"
                    name="password">
            </div>
            
         </formcomponent>
         
         <span slot="buttons">
            <button  form="formEdit"
                type="submit" class="btn btn-info">Save</button>
         </span>
         
     </modal>

     <modal name="details" v-bind:title="$store.state.item.name">
        <p >@{{$store.state.item.email}}</p>
     </modal>

  </page>
@endsection
