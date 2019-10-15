@extends('story.layout')
@section('title', 'story')
@section('content')
    <div class="box">
        <p>
            {{ $text ?? '' }}
        </p>
    </div>
@endsection