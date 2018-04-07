<?php
session_start();

// variabler
$brukernavn = "";
$epost    = "";
$errors = array(); 

// koble opp database
$db = mysqli_connect('localhost', 'root', '', 'registrering'); //legger til databasen

// registrer bruker
if (isset($_POST['reg_bruker'])) {
  // hent tekst fra skjema
  $brukernavn = mysqli_real_escape_string($db, $_POST['username']);
  $epost = mysqli_real_escape_string($db, $_POST['email']);
  $passord_1 = mysqli_real_escape_string($db, $_POST['passord_1']);
  $passord_2 = mysqli_real_escape_string($db, $_POST['passord_2']);

  // sjekker at alle felt er fyllt ut
if (empty($brukernavn)) {
      array_push($errors, "Brukernavn må fylles ut");
    }
    if (empty($epost)) {
      array_push($errors, "Epost må fylles ut");
    }
    if (empty($passord_1)) {
      array_push($errors, "Passord må fylles ut");
    }

    if ($passord_1 != $passord_2) {
      array_push($errors, "Passordene er ikke like ");
    }


  // sjekk at brukernavn eller epost ikke finnes fra før
  $bruker_sjekk = "SELECT * FROM brukere WHERE brukernavn='$brukernavn' OR epost='$epost' LIMIT 1";
  $resultat = mysqli_query($db, $bruker_sjekk);
  $bruker = mysqli_fetch_assoc($resultat);
  
  if ($bruker) { // hvis bruker finnes
    if ($bruker['brukernavn'] === $brukernavn) {
      array_push($errors, "Brukernavn finnes allerede");
    }

    if ($bruker['epost'] === $epost) {
      array_push($errors, "Epost finnes allerede");
    }
  }

  // registrer når ingen feilmeldinger oppstår
  if (count($errors) == 0) {
    $passord = md5($passord_1); // krypter passord

    $query = "INSERT INTO brukere (brukernavn, epost, passord) 
          VALUES('$brukernavn', '$epost', '$passord')";
    mysqli_query($db, $query);
    $_SESSION['brukernavn'] = $brukernavn;
    $_SESSION['epost'] = $epost;
    $_SESSION['penger'] = 0;
    $_SESSION['success'] = "Du er nå logget inn";
    header('location: index.php');
  }
}
// Logg inn
if (isset($_POST['login_bruker'])) {
  $brukernavn = mysqli_real_escape_string($db, $_POST['brukernavn']);
  $passord = mysqli_real_escape_string($db, $_POST['passord']);

  if (empty($brukernavn)) {
    array_push($errors, "Oppgi brukernavn");
  }
  if (empty($passord)) {
    array_push($errors, "Oppgi passord");
  }

  if (count($errors) == 0) {
    $passord = md5($passord); // krypterer passord før den sjekker med databasen
    $query = "SELECT * FROM brukere WHERE brukernavn='$brukernavn' AND passord='$passord'";
    $results = mysqli_query($db, $query);
    $bruker = mysqli_fetch_assoc($results);
    $epost = $bruker['epost'];
    $penger = $bruker['penger'];
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['brukernavn'] = $brukernavn;
      $_SESSION['epost'] = $epost;
      $_SESSION['penger'] = $penger;
      $_SESSION['success'] = "Du er nå logget inn";
      header('location: index.php');
    }else {
      array_push($errors, "Feil Brukernavn/passord");
    }
  }
}

//Ender person opplysninger
if (isset($_POST['change_pwd'])) {
  // hent tekst fra skjema
  $passord_0 = mysqli_real_escape_string($db, $_POST['passord_0']);
  $passord_1 = mysqli_real_escape_string($db, $_POST['passord_1']);
  $passord_2 = mysqli_real_escape_string($db, $_POST['passord_2']);

  // sjekker at alle felt er fyllt ut
  if (empty($passord_0)) {
      array_push($errors, "Gammelt passord må fylles ut");
    }
    if (empty($passord_1)) {
      array_push($errors, "Nytt passord må fylles ut");
    }

    if ($passord_1 != $passord_2) {
      array_push($errors, "Passordene er ikke like ");
    }
  $username = $_SESSION['brukernavn'];
  $pwd_check = "SELECT * FROM brukere WHERE brukernavn='$username' LIMIT 1";
  $resultat = mysqli_query($db, $pwd_check);
  $bruker = mysqli_fetch_assoc($resultat);
  
  if ($bruker) { // hvis bruker finnes
    if (!empty($passord_0)) {
      if (md5($passord_0) != $bruker['passord']) {
        array_push($errors, "Gammelt passord stemmer ikke");
      }
      // registrer når ingen feilmeldinger oppstår
      if (count($errors) == 0) {
        $passord = md5($passord_1); // krypter passord
        //uppdatterer passord
        $query = "UPDATE brukere SET passord = '$passord' WHERE brukernavn='$username'";
        mysqli_query($db, $query);
        //Skriver til output at alt gikk bra.
        array_push($errors, "Passord er nå endret!");
      }
    }
  }
}
if (isset($_POST['change_epost'])) {
  $epost = mysqli_real_escape_string($db, $_POST['email']);
// sjekker at alle felt er fyllt ut
  if (empty($epost)) {
      array_push($errors, "Epost må fylles ut.");
  }

  $query = "SELECT * FROM brukere WHERE epost='$epost' LIMIT 1";
  $resultat = mysqli_query($db, $query);
  $bruker = mysqli_fetch_assoc($resultat);

  if (!empty($epost)) {
    
    if ($bruker) { // hvis bruker finnes
      if ($epost == $_SESSION['epost']) {
        array_push($errors, "Epost er ikke endret.");
      }
      elseif ($bruker['epost'] === $epost) {
        array_push($errors, "Epost finnes allerede");
      }
    }
    // registrer når ingen feilmeldinger oppstår
    if (count($errors) == 0) {
      //uppdatterer passord
      $username = $_SESSION['brukernavn'];
      $query = "UPDATE brukere SET epost = '$epost' WHERE brukernavn='$username'";
      mysqli_query($db, $query);
      $_SESSION['epost'] = $epost;
      //Skriver til output at alt gikk bra.
      array_push($errors, "Epost er nå endret!");
    }
  }
}
if (isset($_POST['penger_inn'])) {
  $penger = mysqli_real_escape_string($db, $_POST['penger']);
// sjekker at alle felt er fyllt ut
  if (empty($penger)) {
      array_push($errors, "Penger kan ikke være tom.");
  }

  if (count($errors) == 0) {
    //uppdatterer penger
    $brukernavn = $_SESSION['brukernavn'];
    $query = "UPDATE brukere SET penger = penger + '$penger' WHERE brukernavn='$brukernavn'";
    mysqli_query($db, $query);

    //Sjekk ny valuta
    $query = "SELECT * FROM brukere WHERE brukernavn='$brukernavn' LIMIT 1";
    $resultat = mysqli_query($db, $query);
    $bruker = mysqli_fetch_assoc($resultat);
      $_SESSION['penger'] = $bruker['penger'];
    //Skriver til output at alt gikk bra.
    array_push($errors, "Penger er nå satt inn!");
  }
}

if (isset($_POST['penger_ut'])) {
  $penger = mysqli_real_escape_string($db, $_POST['penger']);
// sjekker at alle felt er fyllt ut
  if (empty($penger)) {
      array_push($errors, "Penger kan ikke være tom.");
  }

  if ($penger > $_SESSION['penger']) {
      array_push($errors, "Du har ikke så mye penger.");
  }

  if (count($errors) == 0) {
    //uppdatterer penger
    $brukernavn = $_SESSION['brukernavn'];
    $query = "UPDATE brukere SET penger = penger - '$penger' WHERE brukernavn='$brukernavn'";
    mysqli_query($db, $query);

    //Sjekk ny valuta
    $query = "SELECT * FROM brukere WHERE brukernavn='$brukernavn' LIMIT 1";
    $resultat = mysqli_query($db, $query);
    $bruker = mysqli_fetch_assoc($resultat);
      $_SESSION['penger'] = $bruker['penger'];
    //Skriver til output at alt gikk bra.
    array_push($errors, "Penger er nå tatt ut!");
  }
}

//Slette bruker
if (isset($_POST['dlt_usr'])) {
  //TODO ER MAN HELT SIKKER??
  $message = "Helt sikker??";
echo "<script type='text/javascript'>alert('$message');</script>";
  $brukernavn = $_SESSION['brukernavn'];
  $query = "DELETE FROM brukere WHERE brukernavn='$brukernavn' LIMIT 1";
    mysqli_query($db, $query);
    header('location: index.php?logout=\'1\'');
}
?>