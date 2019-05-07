<?php
require_once '../core/dbconnection.php';
include '../includes/header.php';
include '../includes/functies.php';
?>
<div class="container">
    <div class="offset-md-3">
        <form action='wachtwoordReset.php' method ="post" role="form" >
            <h1 class="h3 mb-3 mt-3 font-weight-normal>">Wachtwoord resetten</h1>
            <!-- hieronder wordt de tekst en invulveld voor de gebruikersnaam gemaakt -->
            <div class="form-row">
                <div class="form-group col-md-6">  
                    <label for="inputGebruikersnaam">Gebruikersnaam</label>
                    <input type="text" class="form-control" id="gebruikersnaam" placeholder="Gebruikersnaam">
                </div>
            </div>
            <!-- hieronder wordt de veiliheidsvraag geselecteerd -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="selecteerVeiligheidsvraag">Selecteer je Veiligheidsvraag</label>
                    <select class="Veiliheidsvraag form-control">
                        <option selected>Selecteer</option> <!-- Standard in select menu -->
                        <?php echo vragenOphalen(); ?>
                    </select>
                </div>
            </div>
            <!-- hieronder wordt de veiliheidsvraag beantwoord -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="antwoordVeiligheidsvraag">Antwoord op veiligheidsvraag</label>
                    <input type="text" class="form-control" id="antwoordVeiligheidsvraag" placeholder="Antwoord">
                </div>
            </div>
            <!-- hieronder wordt het nieuwe wachtwoord gegeven (X2) -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="antwoordVeiligheidsvraag">Nieuw wachtwoord</label>
                    <input type="password" class="form-control" id="nWachtwoord1" placeholder="Wachtwoord">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="antwoordVeiligheidsvraag">Herhaal nieuw wachtwoord</label>
                    <input type="password" class="form-control" id="nWachtwoord2" placeholder="Wachtwoord">
                </div>
            </div>
            <!-- hier wordt de reset button gemaakt. -->
            <div class="offset-md-2">
                <div class="form-row">
                    <button  type = "submit" value="wwReset "class="btn bg-flame">Reset Wachtwoord</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include '../includes/footer.php' ?>

<?php 
//    $sqlinformatie = $dbh -> prepare(
//    "SELECT gebruikersnaam, vraag, antwoordtekst FROM Gebruiker WHERE gebruikersnaam = ':gebruikersnaamPHP' "
//);// einde prepared statement $sqlinformatie
//
//
//
//                        if (isset($_POST['wwReset'])){
//                            $gebruikersnaamPHP = $_POST['gebruikersnaam'];
//                            $veiligheidsvraag = $_POST['veiligheidsvraag'];
//                            $antwoordVeiligheidsvraag = $_POST ['antwoordVeiligheidsvraag'];
//                            $nwachtwoord1 = $_POST ['wachtwoord1'];
//                            $nwachtwoord2 = $_POST['wachtwoord2'];
//
//                            if ($nwachtwoord1 == $nwachtwoord2){
//
//                                while ($data = $sqlinformatie-> fetch() ){
//                                    $dbgebruikersnaam = $data['gebruikersnaam'];
//                                    $dbVvraag = $data['vraag'];
//                                    $dbVantwoord = $data['antwoordtekst'];
//                                    if ($gebruikersnaamPHP == $dbgebruikersnaam ){
//                                        if ($antwoordVeiligheidsvraag == $dbVvraag){
//                                            if ($antwoordVeiligheidsvraag == $dbVantwoord){
//
//                                            }
//                                        }
//                                    }
//                                }
//                            }// einde if ww vergelijking
//                        }// einde if isset
?>