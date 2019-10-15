@extends('story.layout')
@section('title', 'Story')
@section('content')
    <div class="box">
        <p>
            {{ $text ?? '' }}
        </p>
    </div>
@endsection