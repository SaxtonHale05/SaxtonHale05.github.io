SQL!
Muista että pitää olla samassa järjestyksessä!

function updatechar($wat, $luokk, $rott, $nimm, $charid){
  $sql = "UPDATE mychar SET name=?, classid=?, raceid=? WHERE characterid=?";
  $statement = $wat->prepare($sql);
  $statement->execute([$nimm, $luokk, $rott, $charid]);
}

Muista tarkistaa ECHOLLA JA ELSELLÄ MISSÄ VIRHEET.

MUISTA RESERVÖIDYT SANAT JOITA EI VOI KÄYTTÄÄ, MUISTA (name as charact_name)!

FETCHALL JA FETC EI OLE SAMA!


url to img php
 <div class="box">
                      <?php
                if (empty($ed["chimage"])) {
                  echo "<h3>" . "Ei kuvaa vielä" . "</h3>";
                } else {
                $image = $ed["chimage"];
                $imageData = base64_encode(file_get_contents($image));
                echo '<img src="data:image/jpeg;base64,'.$imageData.'">'; }
                ?>
      </div>

        $wat = new PDO('mysql:host=localhost;dbname=21viljaa', 'root', '');