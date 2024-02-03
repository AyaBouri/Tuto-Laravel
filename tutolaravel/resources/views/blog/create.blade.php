@extends('base')
@section('title','Créer un article')
@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="title" value="Article de demonstartion">
        <textarea name="content">Content de demonstartion</textarea>
        <button>Enregistrer</button>
    </form>
@endsection
