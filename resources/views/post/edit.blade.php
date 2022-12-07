@extends('layouts.app')
@section('content')
<div class="container">
  
    <form action="{{ url('/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        @include('post.form_edit_post')            
    </form>
</div>
@endsection
