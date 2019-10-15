<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create stories</title>
</head>
<body>
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
</body>
</html>