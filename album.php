<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Music Shop</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <header>
      <h1><a href="/">Music Shop</a></h1>
      <form action="action_login.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <a href="register.php">Register</a>
        <button type="submit">Login</button>
      </form>
    </header>
  
    <main>
      <h2>Album Name</h2>
      <h3><a href="group.php?id=1">Group Name</a></h2>      
      <table id="tracks">
        <tr><th scope="col">#</th><th scope="col">Name</th><th scope="col">Duration</th></tr>
        <tr><td>1</td><td>Track Name</td><td>3:43</td></tr>
        <tr><td>2</td><td>Track Name</td><td>5:02</td></tr>
        <tr><td>3</td><td>Track Name</td><td>4:12</td></tr>
        <tr><td>4</td><td>Track Name</td><td>3:27</td></tr>
      <table>
    </main>

    <footer>
      LTW Music Example &copy; 2022
    </footer>
  </body>
</html>