<?php 
$events = [];

if(file_exists('data.json')) {
  $json = file_get_contents('data.json');
  $events = json_decode($json, true);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>  
    <div id="container">
      <div id="header">
        <div id="monthDisplay"></div>
        <div>
          <button id="backButton">Terug</button>
          <button id="nextButton">Volgende</button>
        </div>
      </div>

      <div id="weekdays">
        <div>maandag</div>
        <div>dinsdag</div>
        <div>woensdag</div>
        <div>donderdag</div>
        <div>vrijdag</div>
        <div>zaterdag</div>
        <div>zondag</div>
      </div>

      <div id="calendar"></div>
      
    </div>

    <form method="post" action="./dataHandeling.php">
      <div id="newEventModal">
        <h2>New Event</h2>
        <input name="event" id="eventTitleInput" placeholder="Event Title" required>  
        <input name="time" type="time" id="eventTitleInput" placeholder="tijd" required>

        <?php if($events) { foreach($events as $i => $j) { ?>
          <div>
            <?php if($j && $i) {echo $j . ' op ' . $i; }  ?> 
            <form style="display: inline-block;" action="delete.php" method="POST">
              <input type="hidden" name="i" value="<?= $i ?>">
              
              <?php if($j && $i) {echo '<button style="background-color: #d36c6c;">verwijderen</button>'; }?>
            </form>
          </div>
          <br>
        <?php }} ?>
        <input type="submit" name="submit" value="toevoegen" id="saveButton">
        <input type="reset" name="reset" id="cancelButton" value="Annuleren">
      </div>
    </form>

    <div id="modalBackDrop"></div>

    <script src="./script.js"></script>
</body>
</html>
