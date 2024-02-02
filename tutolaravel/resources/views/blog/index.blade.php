@extends('base')
@section('title','Accueil du blog')
@section('content')
    <h1>Mon blog</h1>
    @dump(['azeaze'])
    @if(true)
        {{ "azeaze" }}
    @else
    @endif
    <?= "Te<strong>xte </strong>" ?>
@endsection
