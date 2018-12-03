@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <panel title="Dashboard">
                    <div class="row">
                        <div class="col-md-4">
                            
                            <box></box>
                        </div>
                        <div class="col-md-4">
                            <panel title="contendo 2" color="bg-warning">text</panel>
                        </div>
                        <div class="col-md-4">
                            <panel title="contendo 3" color="orange">text</panel>
                        </div>
                    </div>
                </panel>
            </div>
        </div>
    </div>

@endsection
