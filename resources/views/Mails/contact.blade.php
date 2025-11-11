<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body style="background:#eee; padding:0 auto;">
    <div style="width:600px; margin:0 auto; padding:20px; background
    :#fff; border:1px solid #ddd; " >
    <h1 style="text-align:center;">Welcome Admin</h1>
    <p>Hope this email finds you will</p>
    <p>Below are the details of the user who has requested to contact us</p>
    <br>
    <p><b>Name:</b>{{ $data['name'] }}</p>
    <p><b>Email:</b>{{ $data['email'] }}</p>
    <p><b>Phone:</b>{{ $data['phone'] }}</p>
    <p><b>Subject:</b>{{ $data['subject'] }}</p>
    <p><b>Message:</b>{{ $data['message'] }}</p>
    <br>
    <p>Thank you for your time and we will get back to you soon</p>

</body>
</html>
