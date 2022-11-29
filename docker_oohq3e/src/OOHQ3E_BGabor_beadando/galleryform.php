<!DOCTYPE html>

    <body>
        <main>
        <h2>Új Kép Felvétele a Galériába</h2>
        
        <hr>    
        
        <form name="regurlap" method="post" action="addgallery.php" enctype=multipart/form-data>
            <table>
                <tr><td colspan=2><p><b><i>Két kép ugyanazzal a címmel nem szerepelhet a rendszerben!</i></b></p><td><tr>
                <tr><td><b>Kép: </b></td><td><input type="file" name="nameimg" required></td><td></td></tr>
                <tr><td><b>Cím: </b></td><td><input type="text" name="name" pattern="[A-Z a-z 0-9]*" placeholder="Angol abc és számok" maxlength="50" required size="35"></td></tr>
                <tr><td><b>Méret: </b></td><td><input type="text" name="meret" pattern="[x 0-9]*" placeholder="Szélesség x magasság" maxlength="35" required size="35"> cm</td></tr>
                <tr><td><b>Dátum: </b></td><td><input type="text" name="datum" pattern="[A-Z aáeéiíoóöőuúüű AÁEÉIÍOÓÖŐUÚÜŰ ./-_ a-z 0-9]*" placeholder="Pl.:2020 október 7." maxlength="35" required size="35"></td></tr>
                <tr><td><b>Technika: </b></td><td><input type="text" name="kategoria" pattern="[A-Z aáeéiíoóöőuúüű AÁEÉIÍOÓÖŐUÚÜŰ a-z 0-9]*" placeholder="Pl.:ceruza" maxlength="40" required size="35"></td></tr>
                <tr><td><b>Alkotó neve: </b></td><td><input type="text" name="alkoto" pattern="[A-Z aáeéiíoóöőuúüű AÁEÉIÍOÓÖŐUÚÜŰ a-z 0-9]*" maxlength="60" required size="35"></td><td></td></tr>
                <tr><td><input class="button" type="submit" value="Kép Felvétele" name="send"></td><td><input class="button" type="reset" value="Adatok törlése" name="delete"></td></tr>
            </table>
        </form>
        
        </main>
    </body>
