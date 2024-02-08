<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Meeting Invitation</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  }
  h1 {
    color: #333333;
    text-align: center;
  }
  .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #c0cddb;
    color: #111010;
    text-decoration: none;
    border-radius: 5px;
  }
  .button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
  <div class="container">
    <h1>Meeting Invitation</h1>
    <p>You're invited to join our meeting. Click the button below to join:</p>
    <p style="text-align: center;"><a class="button" href="{{ url("$meetingLink")}}" target="_blank">Join to Meet</a></p>
  </div>
</body>
</html>
