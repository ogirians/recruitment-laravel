@extends('layouts.app')

@section('content')
<h4>{{ $article->title }}</h4>
<p>{{ $article->content }}</p>
<a href="{{ route('article.index') }}" class="btn btn-default">Kembali</a>
@endsection