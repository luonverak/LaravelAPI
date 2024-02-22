<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/input" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="text" name="first_name" id=""> <br> <br>
        <input type="text" name="last_name" id=""> <br> <br>
        <select name="gender" id=""> <br> <br>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select> <br><br>
        <input type="text" name="age" id=""> <br> <br>
        <input type="text" name="address" id=""> <br> <br>
        <input type="file" name="image" id="">
        <input type="submit" name="btnSubmit" value="Submit" id="">
    </form>
</body>
</html>