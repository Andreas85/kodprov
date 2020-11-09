<?php
include '../../config/database_kodprov.php';

if (isset($_POST['email']) || isset($_POST['message'])) {

    // Todo: Add validation

    $sql = "
        INSERT INTO
            messages (email, message)
        VALUES
            (
              '" . $conn->real_escape_string($_POST['email']) . "',
              '" . $conn->real_escape_string($_POST['message']) . "'
            )";

    $result = $conn->query($sql);

}

if (isset($_GET['del'])) {

    $sql = "
        DELETE FROM
            messages
        WHERE
            id = '" . $conn->real_escape_string($_GET['del']) . "'";

    $result = $conn->query($sql);
}

if (isset($_GET['page']) && $_GET['page'] == 'messages') {

    $sql = "
        SELECT
            id,
            email,
            message
        FROM
            messages";

    $messages = $conn->query($sql);
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
      crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/contact.js"></script>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="container mt-4">
      <div class="row">
        <div class="col-12 header-div"><h1>Andreas kodprov</h1></div>
      </div>
      <div class="row menu-div">
        <div class="col-md-4 menu-col">
          <a href="index.php?page=home" class="<?php echo (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == 'home') ? 'active' : '' ?>">HOME</a>
        </div>
        <div class="col-md-4 menu-col">
          <a href="index.php?page=messages" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'messages') ? 'active' : '' ?>">MESSAGES</a>
        </div>
        <div class="col-md-4 menu-col">
          <a href="index.php?page=contact" class="<?php echo (isset($_GET['page']) && $_GET['page'] == 'contact') ? 'active' : '' ?>">CONTACT</a>
        </div>
      </div>
      <div class="row content-div">
        <?php
          if (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == 'home') {
            include 'pages/home.php';
          } elseif ($_GET['page'] == 'messages') {
            include 'pages/messages.php';
          } elseif ($_GET['page'] == 'contact') {
            include 'pages/contact.php';
          }
        ?>
      </div>
    </div>
  </body>
</html>
