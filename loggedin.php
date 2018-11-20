<?php
include "includes/functions.php";
?>

<?php include "includes/header.php"?>
<?php
//gør siden kun tilgængelig hvis man er logget ind
if(!isset($_SESSION['u_email'])){
    header("Location: index.php");
 }
?>
<div class="w-50 mx-auto tak">
    <div class="container text-center">
        <h1>Velkommen til dit bruger dashboard</h1>
        <p>Her kan du vælge at gøre forskellige ting med din konto. <br />
        Siden er stadig under konstruktion og det betyder manglende funktionalitet :-)</p>
        <?php
            logUdKnap();
          ?>
          <h5>Ønsker du ikke at have din bruger mere kan du slette den herunder</h5>
          <?php
            sletBrugerKnap();
          ?>
    </div>
</div>    

<?php include "includes/footer.php"?>