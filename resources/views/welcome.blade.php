<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recaptcha Testing With Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        h3{
            text-align: center;
            margin-top: 15px;
        }
    </style>
  </head>
  <body>
    <h3>Form With Recaptcha</h3>
    <div class="container">
        <form action="/handle-captcha" method="POST" id="captcha-form">
            @csrf
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="g-recaptcha my-2" data-sitekey="6LfwUu8oAAAAAOk8-_crbT2xJKnOgVYQYnOXI0vV"></div>
            <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        document.getElementById('captcha-form').addEventListener('submit', function (e) {
            if (grecaptcha.getResponse() == '') {
                alert('Please complete the reCAPTCHA.');
                e.preventDefault();
            }
        });
    </script>