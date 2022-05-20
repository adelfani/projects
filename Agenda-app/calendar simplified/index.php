<?php 

$connection = require_once './connection.php';

$events = $connection->getEvents();

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
  <div id="center">
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
  </div>

  <div id="info">
    <div id="contaner"> 
       <h1>Evenementen</h1>
        <?php foreach($events as $event): ?>
          <div class="events">
              <?php echo $event['evenementen'] . ' op ' . $event['tijd'] . '<br><br>'  . $event['datum'] ?>
              <form action="delete.php" method="POST">
                  <input type="hidden" name="id" value="<?= $event['id'] ?>">
                  <input type="hidden" name="evenementen" value="<?= $event['evenementen'] ?>">
                  <?php echo '<button style="background-color: #d36c6c;">verwijderen</button>';?>
              </form> 
          </div> <br><br>
        <?php endforeach; ?> 
    </div>

    <form method="post" action="./dataHandeling.php" id="newEventModal">
        <h2>Nieuw evenement</h2>
        <input name="evenementen" id="eventTitleInput" placeholder="Titel van het evenement" required>  
        <input name="tijd" type="time" id="eventTitleInput" placeholder="tijd" required>
        <input type="date" id="eventTitleInput" name="datum" min="2000-01-02">
        <input type="submit" name="submit" value="toevoegen" id="saveButton">
    </form>
  </div>  

  <script src="./script.js"></script>
</body>
</html>
