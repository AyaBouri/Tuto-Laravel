@extends('base')
@section('title','Créer un article')
@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title','Mon titre') }}">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label>Slug</label>
            <input type="text" value="{{old('slug','Slug')}}">
            @error('slug')
                {{$slug}}
            @enderror
        </div>
        <div>
            <label>Content</label>
            <textarea name="content">{{old('content','Contenu de demonstartion')}}</textarea>
            @error('content')
                {{ $content }}
            @enderror
        </div>
        <button>Enregistrer</button>
    </form>
@endsection
