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
      <form action="action_login.php" method="post" class="login">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <a href="register.php">Register</a>
        <button type="submit">Login</button>
      </form>
    </header>
  
    <main>
      <h2>Artists</h2>
      <section id="artists">
        <article>
          <img src="https://picsum.photos/200?1">
          <a href="artist.php?id=1">Artist Name</a>
        </article>

        <article>
          <img src="https://picsum.photos/200?2">
          <a href="artist.php?id=1">Artist Name</a>
        </article>

        <article>
          <img src="https://picsum.photos/200?3">
          <a href="artist.php?id=1">Artist Name</a>
        </article>
      </section>
    </main>

    <footer>
      LTW Music Example &copy; 2022
    </footer>
  </body>
</html>