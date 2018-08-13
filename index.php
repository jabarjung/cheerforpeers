<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- (http-equiv="refresh" content="60")
    Page is reloaded after every 60 seconds or 1 minute. It's a quick fix.
    Otherway would be to use the stream. Will figure that out later. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cheers for Peers</title>
    <!-- Bootstrap core CSS -->
    <!-- Either I can use local copy of 'bootstrap.min.css' or get that from CDN. I am using one from CDN. -->
    <!-- <link href="./includes/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./includes/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./includes/main-stylesheet.css" rel="stylesheet" type="text/css">
    <!-- <link href="./includes/qfc-dark.css" rel="stylesheet" type="text/css"> -->
    <link href="./includes/qfc-light.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="qfc-container">
      <h4><b>Cheers for Peers</b></h4>
      <label><em>A way of turning your co-worker into a friend.</em></label>
      <form method="post" action="sendMail.php">
        <!-- Your name : <input type="text" name="userName"> <br/> -->
        <div><input placeholder="Your Name" type="text" name="userName" required></div>
        <div><input placeholder="Your User ID" type="text" name="userID" required></div>
        <div><input placeholder="Password" type="password" name="userPassword" required></div>
        <div><input placeholder="Recipient's Name" type="text" name="recipientName" required></div>
        <div><input placeholder="Recipient's Email Address" type="email" name="recipientEmailAddress" required></div>
        <div>
          <label><b>Message</b></label>
          <div>
            <textarea id="messageBox" placeholder="Type your beautiful message here (maximum character length is 28)." maxlength="28" name="emailMessage" required></textarea>
          </div>
        </div>
        <div>
          <button type="submit">Send Cheer</button>
        </div>
      </form>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./includes/jquery.min.js"><\/script>')</script>
    <!-- Either I can use local copy of 'bootstrap.min.js' or get that from CDN. I am using one from CDN. -->
    <!-- <script src="./includes/bootstrap.min.js"></script> -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./includes/holder.min.js"></script>
    <script src="./includes/custom.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./includes/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
