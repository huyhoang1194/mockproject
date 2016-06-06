<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
      
        <h2>Active your user  </h2>
        <div>
            Thanks for creating an account with the app.
            Please follow the link below to verify your email address
            {{ URL::to('email/active/' . $code)}}<br/>
        </div>
    </body>
</html>