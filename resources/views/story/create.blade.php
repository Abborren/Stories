@extends('story.layout')
@section('title', 'Error')
@section('content')
    <form action="/story" method="post">
        @csrf
        <p>
            Som en 
            <input type="text" name="role" id="role">
            vill jag 
            <input type="text" name="activity" id="activity">
            <select name="preposition" id="preposition">
                <option value=" på ">på</option>
                <option value=" i ">i</option>
            </select>
            <input type="text" name="context" id="context">
            för att
            <input type="text" name="reason" id="reason">
            .
            <input type="submit" value="submit">
        </p>
    </form>
@endsection
    