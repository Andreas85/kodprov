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

    <script>
        window.addEventListener('popstate', function(e) {
            var location = e.state;

            if (location != null) {
                $('[data-home-container]').hide();
                $('[data-messages-container]').hide();
                $('[data-contact-container]').hide();

                $('[data-' + location + '-container]').show();
            } else {
                window.history.back();
            }
        });
    </script>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="container mt-4">
      <!-- Content here -->
      <div class="row">
        <div class="col-12 header-div"><h1>Andreas kodprov</h1></div>
      </div>
      <div class="row menu-div">
        <div class="col-md-4 menu-col">
          <a href="" data-menu-link="home">HOME</a>
        </div>
        <div class="col-md-4 menu-col">
          <a href="" data-menu-link="messages">MESSAGES</a>
        </div>
        <div class="col-md-4 menu-col">
          <a href="" data-menu-link="contact">CONTACT</a>
        </div>
      </div>
      <div class="row content-div">
        <?php
            include 'pages/home.php';
            include 'pages/messages.php';
            include 'pages/contact.php';
        ?>
      </div>
    </div>
  </body>
</html>
