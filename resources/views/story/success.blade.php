@extends('story.layout')
@section('title', 'lyckades')
@section('content')
<script src="/js/link.js"></script>
    {{-- <script src="https://github.com/zenorocha/clipboard.js.git"></script> --}}
    <div class="box">
        <p class="clipboard">
            <input id="foo" value="{{ $url ?? '' }}">
            <button class="btn" data-clipboard-target="#foo">
                <img src="/assets/clippy.svg" alt="Copy to clipboard">
            </button>
        </p>
        <p>
            Skicka denna länk till din lärare!
        </p>
        <a href="/" class="button">tillbaka</a>
    </div>
@endsection