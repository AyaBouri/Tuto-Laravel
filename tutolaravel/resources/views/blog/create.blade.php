@extends('base')
@section('title','Créer un article')
@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <input type="text" name="title" value="{{ old('title','Mon titre') }}">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div>
            <textarea name="content">{{old('content','Contenu de demonstartion')}}</textarea>
            @error('content')
                {{ $content }}
            @enderror
        </div>
        <button>Enregistrer</button>
    </form>
@endsection
