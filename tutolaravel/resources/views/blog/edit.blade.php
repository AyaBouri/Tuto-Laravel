@extends('base')
@section('title','Modifier un article')
@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title',$post->title) }}">
            @error('title')
            {{ $message }}
            @enderror
        </div>
        <div>
            <label>Slug</label>
            <input type="text" value="{{old('slug',$post->slug)}}">
            @error('slug')
            {{$slug}}
            @enderror
        </div>
        <div>
            <label>Content</label>
            <textarea name="content">{{old('content',$post->content)}}</textarea>
            @error('content')
            {{ $content }}
            @enderror
        </div>
        <button>Enregistrer</button>
    </form>
@endsection
