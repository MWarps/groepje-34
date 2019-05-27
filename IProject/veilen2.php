<?php
include 'includes/header.php';
if(isset($_SESSION['gebruikersnaam'])){
if(isset($_POST['Volgende'])){
  $rubriek = $_POST['rubriek'];
  $titel = $_POST['titel'];
  $beschrijving = $_POST['beschrijving'];
  $startbedrag = $_POST['startbedrag'];
  $betalingsmethode = $_POST['betalingsmethode'];
  $betalingsinstructie = $_POST['betalingsinstructie'];
  $verzendkosten = $_POST['verzendkosten'];
  $verzendinstructies = $_POST['verzendinstructies'];
  $plaats = $_POST['plaats'];
  $land =  $_POST['rLand'];
  $looptijd = $_POST['looptijd'];
   
  $gebruiker = HaalGebruikerOp($_SESSION['gebruikersnaam']);
  
  $voorwerp = array($titel, $beschrijving, $startbedrag, $betalingsmethode,
  $betalingsinstructie, $plaats, $land, $looptijd, $verzendkosten, 
  $verzendinstructies, $gebruiker['gebruikersnaam'], $looptij);
  
  //VoegVoorwerpToe($voorwerp);
    
  $target_dir = "upload/";
  
  $bestand_naam = "dt_1_" + $voorwerpnr;
  $target_file = $target_dir . basename($_FILES["foto1"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["foto1"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file . $bestand_naam )) {
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  if(isset($_FILES["foto2"])){
    $bestand_naam = "dt_1_" + $voorwerpnr;
    $target_file = $target_dir . basename($_FILES["foto1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["foto1"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file . $bestand_naam )) {
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }    
  }
  //VoegVoorwerpAanRubriekToe($rubriek, $gebruiker['gebruikersnaam']);
  //$_SESSION['status'] = 'Voorwerp';
  
  //echo '<script language="javascript">window.location.href ="index.php"</script>';
  //exit();
  
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-2">
          <form class="needs-validation" novalidate action="veilen2.php?id=<?php echo $_GET['naam'];?>" method="POST" enctype="multipart/form-data">
                <h1 class="h3 mb-2 text-center "> Veiling starten </h1>
                <p class=" mb-2 text-center " > Hier kunt u een voorwerp te koop aan bieden, vul alle onderstaande velden in.</p>                      
                
                  <div class="col-md-5">
                      <label for="Rubriek">Rubriek</label>
                      <input type="text" name="rubriek" class="form-control" id="rubriek" value="<?php echo $_GET['naam']; ?>" placeholder="<?php echo $_GET['naam']; ?>"
                       readonly>
                  </div>
                    <div class="form-group col-md-10">
                        <label for="inputTitel">Titel (Vul een titel in. Denk aan belangrijke eigenschappen zoals kleur, merk of maat):</label>
                        <input type="text" name="titel" class="form-control" id="inputTitel"
                               pattern="[A-Za-z0-9]*" maxlength="100" placeholder="Titel" value="<?php if($_POST) { echo $_POST['rTitel'];} ?>" required>
                        <div class="invalid-feedback">
                            Voer een titel in.
                        </div>
                    </div>                  
                    <div class="form-group col-md-8">  
                        <label for="Textarea">Beschrijving:</label>
                        <textarea name="beschrijving" class="form-control" placeholder="Voer hier uw bericht in." id="Textarea" rows="10" required></textarea>                
                        <div class="invalid-feedback">
                          Voer een bericht in.
                        </div>                      
                    </div>
                
                    <div class="form-group col-md-6">
                        
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Voeg minimaal 1 afbeelding toe</label>
                                <input type="file" class="form-control-file" name="foto1" accept="image/*" id="foto1" required>
                                <div class="invalid-feedback">
                                  Geef minmaal 1 foto mee.
                                </div>  
                                <label for="exampleFormControlFile2">Afbeelding 2</label>
                                <input type="file" class="form-control-file" accept="image/*" name="foto2" id="foto2">
                                <label for="exampleFormControlFile3">Afbeelding 3</label>
                                <input type="file" class="form-control-file" accept="image/*" name="foto3" id="foto3">
                                <label for="exampleFormControlFile4">Afbeelding 4</label>
                                <input type="file" class="form-control-file" accept="image/*" name="foto4" id="foto4">
                            </div>                      
                    </div>
              
                
                    <div class="form-group col-md-4">
                        <label for="inputStartbedrag">Startbedrag in euro's</label>
                        <input type="number" min="0" name="startbedrag" class="form-control" id="inputStartbedrag" placeholder="€..."
                               step="0.01" maxlength="5" value="<?php if($_POST) { echo $_POST['startbedrag'];} ?>" required>
                        <div class="invalid-feedback">
                            Voer een geldig startbedrag in, dit getal moet hoger zijn dan 0.
                        </div>
                    </div>
                    <div class="form-group col-md-8">  
                        <label for="Textarea">Betalingsinstructies(optioneel):</label>
                        <textarea name="betalingsinstructie" class="form-control" placeholder="Voer hier uw bericht in." id="Textarea" rows="10"></textarea>                                   
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="inputStartbedrag">Verzendkosten</label>
                        <input type="number" min="0" name="verzendkosten" class="form-control" id="inputStartbedrag" placeholder="€..."
                               pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,49}$" maxlength="5" value="<?php if($_POST) { echo $_POST['startbedrag'];} ?>" required>
                        <div class="invalid-feedback">
                            Voer een geldig startbedrag in, dit getal moet hoger zijn dan 0.
                        </div>
                    </div>
                    <div class="form-group col-md-8">  
                        <label for="Textarea">Verzendinstructies(optioneel):</label>
                        <textarea name="verzendinstructies" class="form-control" placeholder="Voer hier uw bericht in." id="Textarea" rows="10"></textarea>                                   
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="inputBetalingsmethode">Gewenste betalingsmethode</label>
                        <select name="betalingsmethode" class="form-control" id="inputBetalingsmethode" value="<?php if($_POST) { echo $_POST['rBetalingsmethode'];} ?>" required>
                            <option value="Contant"> Contant </option>
                            <option value="iDeal"> iDeal </option>
                            <option value="Paypal"> Paypal </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPlaats">Plaats</label>
                        <input type="text" name="plaats" class="form-control" id="inputPlaats" placeholder="Plaats"
                        pattern="[A-Za-z]*" maxlength="28" value="<?php if (isset($_POST['rPlaats'])) echo $_POST['rPlaats']; ?>" required>
                        <div class="invalid-feedback">
                        Voer een plaats in.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <?php  echo landen(); ?>
                    </div>
            
                    <div class="form-group col-md-6">
                      <p> looptijd: </p>
                      <!-- Group of default radios - option 1 -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="looptijd" checked>
                        <label class="custom-control-label" for="defaultGroupExample1">5 dagen</label>
                      </div>

                      <!-- Group of default radios - option 2 -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="looptijd">
                        <label class="custom-control-label" for="defaultGroupExample2">7 dagen</label>
                      </div>

                      <!-- Group of default radios - option 3 -->
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="looptijd">
                        <label class="custom-control-label" for="defaultGroupExample3">10 dagen</label>
                      </div>  
                    </div>
                
                
                    <div class="form-group">
                        <div class="form-check">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" value="" id="defaultUnchecked" required>
                                <label class="custom-control-label" for="defaultUnchecked">
                                    Ga akkoord met de algemene voorwaarden.
                                </label>
                                <div class="invalid-feedback">
                                    U moet akkoord gaan met onze algemene voorwaarden voordat u kan registreren.
                                </div>
                            </div>
                        </div>
                    </div>            
                <button type="submit" name="Volgende" id="Volgende" class="btn bg-flame">
                    Volgende
                </button>
            </form>
        </div>
    </div>
</div>


<?php
}
else {
  include 'includes/404error.php';
}
include 'includes/footer.php';
?>

