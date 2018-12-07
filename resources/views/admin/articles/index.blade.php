@extends('layouts.app')

@section('content')
  <page size="12">
    <panel title="List of Articles">
        <breadcrumb
            v-bind:list="{{$listBreadcrumbs}}"></breadcrumb>
        <button type="button" class="btn btn-primary" data-toggle="modal" 
            data-target="#myModalTest">
            Launch demo modal
            </button>
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
    <modal name="myModalTest">
        <form action="/action_page.php">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd">
            </div>
            <div class="form-group form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember me
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </modal>
  </page>
@endsection
