@extends('story.layout')
@section('title', 'skapa')
@section('content')
{{-- TODO: Add error validation for the fields. --}}
    <form action="/story" method="post" class="box" autocomplete="off">
        @csrf
        <p>
            Som en 
        <input type="text" name="role" id="role" 
            placeholder="{{$role ?? ''}}" 
            value="{{ old('role') ?? '' }}"
            @error('role')
                class="error"
            @enderror    
        >
        vill jag
     
        <input type="text" name="activity" id="activity" 
            placeholder="{{$activity ?? ''}}" 
            value="{{ old('activity') ?? '' }}"
            @error('activity')
                class="error"
            @enderror 
        >
        <select name="preposition" id="preposition">
            <option value=" på ">på</option>
            <option value=" i ">i</option>
        </select>
        <input type="text" name="context" id="context" 
            placeholder="{{$context ?? ''}}"
            value="{{ old('context') ?? '' }}"
            @error('context')
                class="error"
            @enderror
            
        >
        för att
        <input type="text" name="reason" id="reason" 
            placeholder="{{$reason ?? ''}}"
            value="{{ old('reason') ?? '' }}"
            @error('reason')
                class="error"
            @enderror
        >
        </p>
        <input type="submit" value="skicka" class="button">
    </form>
@endsection
    