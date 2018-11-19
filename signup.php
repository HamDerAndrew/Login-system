<?php 
include "includes/functions.php";

createUser();
?>

<?php include "includes/header.php"?>

<?php 
if(!isset($_SESSION['u_email'])) {
  echo '<form action="login.php" method="POST">
  <div class="w-100 top-form">
    <div class="row w-50 mx-auto p-2">
      <div class="col-md-5">
        <input type="text" class="form-control" name="email" placeholder="Email">
      </div>
      <div class="col-md-5">
        <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary" name="login">Log ind</button>
      </div>
    </div>
  </div>
</form>';
}
?>

  <div class="container">
    <div class="row pt-5 pb-5">
      <div class="col-md-6 pt-5">
      <h1>Gør karriere hos X Firma idag!</h1>
      <h3>Opret dig i vores system og upload dit CV. Vi sørger for at du får tilbagemelding 24 timer efter du har indsendt det (også selvom vi ikke har en stilling til dig)</h3>
      </div>
      <div class="col-md-6 p-4 top-form rounded">
        <form action="signup.php" method="post">
          <div class="form-group">
            <label class="text-white" for="fornavn">Fornavn</label>
            <input type="text" class="form-control" name="fornavn" placeholder="Fornavn">
          </div>
          <div class="form-group">
            <label class="text-white" for="efternavn">Efternavn</label>
            <input type="text" class="form-control" name="efternavn" placeholder="Efternavn">
          </div>
          <div class="form-group">
            <label class="text-white" for="email">Email adresse</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Indtast email">
          </div>
          <div class="form-group">
            <label class="text-white" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
        </form>
      </div>
    </div>
  </div>

<?php include "includes/footer.php"?>