<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="content-style-type" content="text/css">
        <link rel="stylesheet" type="text/css" href="css/registerstyle.css">
        <title>Regisztráció</title>
    </head>
    <body>
        <div class="wrapper">
             <header>
                <h1>Regisztrációs oldal</h1>
            </header>
            <main>
                <h3>A *-gal jelölt mezők kitöltése kötelező</h3>
                <form name="regurlap" method="post" action="register.php" enctype=multipart/form-data>
                        <table>
                        <tr><td><b>Profilkép:*</b></td><td><input type="file" name="profileimg" required></td></tr>
                        <tr><td><b>Felhasználónév*</b><i>(angol abc betűi és számok):</i></td><td><input type="text" name="username" maxlength="40" pattern="^[-a-zA-Z0-9]+$" required size="35"></td></tr>
                        <tr><td><b>E-mail:*</b></td><td><input type="email" name="email" maxlength="60" required size="35"></td></tr>
                        <tr><td><b>Jelszó:*</b><i>(betűt és számokat tartalmazhat)</i></td>
                        <td><input type="password" name="passwd" pattern="[A-Z a-z 0-9]*"  maxlength="40" required size="35"></td></tr>
                        <tr style="text-align:right;"><td><input class="button" type="submit" value="Regisztráció" name="send"></td>
                        <td><input class="button" type="reset" value="Adatok törlése" name="delete"></td></tr>
                        <tr><td><a class="vissza" href="loginpage.html">Vissza a bejelentkezési oldalra</a></td></tr>
                        </table>
                </form>
            </main>
        </div>
      <footer>
        <div class="extra">© Bagoly Gábor - OOHQ3E, 2021 <br>Developed by Bagoly Gábor</div>
      </footer>
    </body>
</html>
