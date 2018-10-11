@extends('layouts.layout')

@section('title')
{{ $title }}
@endsection

@section('content')

<div class="bloc">
    <div class="formContact" class="container ">

        <div class="row card text-white bg-dark">

            <h4 class="card-header">{{ $title }}</h4>

            <div class="card-body"> 

               <p class="card-text">{{ $msg }}</p>

            </div>

        </div>

    </div>
</div>
@endsection

