<?php
 
function createUser() {
    if(isset($_POST['submit'])) {

        //forbind til db
        include_once "db.php";

        $connection;
        $fornavn = $_POST['fornavn'];
        $efternavn = $_POST['efternavn'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //tjek at felterne er fyldt ud
        if(empty($fornavn) || empty($efternavn) || empty($email) || empty($password)) {
            echo "<script>alert('Alle felter skal udfyldes');</script>";
            return false;
        } else {
            //tjek for valid input characters
            if(!preg_match("/^[a-zA-Z]*$/", $fornavn) || !preg_match("/^[a-zA-Z]*$/", $efternavn)) {
                echo "<script>alert('Brug kun store og små bogstaver fra A-Z');</script>";
                return false;
            } else {
                //tjek at email er valid
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Ikke godkendt email');</script>";
                    return false;
                } else {
                    //tjek at email ikke allerede findes
                    $sql = "SELECT * FROM users WHERE email ='$email'";
                    $sqlResult = mysqli_query($connection, $sql);
                    $checkResult = mysqli_num_rows($sqlResult);
                    
                    if($checkResult > 0) {
                        echo "<script>alert('email eksistere allerede');</script>";
                        return false;
                    }
                }
            }
        }
        
 
        //Forebyggelse af MySQL Injections
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        //blowfish hashformat
        $hashFormat = "$2y$07$";

        //string til at salte med
        $salt = "lpa32op098jmnfq0JxalX2";

        //sammensæt hash og salt
        $hashSalt = $hashFormat . $salt;

        //encrypt password
        $password = crypt($password, $hashSalt);

        //send query til databasen med indtastede værdier fra form
        $query = "INSERT INTO users (fornavn, efternavn, email, password) ";
        $query .= "VALUES ('$fornavn', '$efternavn', '$email', '$password')";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header("Location: /Ordbogen/tak.php");
        }
    } 
}

function userLogin() {
        session_start();

    if(isset($_POST['login'])) {

        //forbind til db
        include_once "db.php";

        $connection;
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Forebyggelse af MySQL Injections
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        //Tjek om inputs er tomme
        if(empty($email) || empty($password)) {
            header("Location: signup.php?=emptyfields");
            exit();
        } else {
            //tjek brugeren i databasen
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $sqlResult = mysqli_query($connection, $sql);
            $checkResult = mysqli_num_rows($sqlResult);
            
            if($checkResult < 1) {
                header("Location: signup.php?=checkResult");
                exit();
            } else {
                if($row = mysqli_fetch_assoc($sqlResult)) {
                    //dehash password
                    $hashedPassCheck = password_verify($password, $row['password']);
                    if($hashedPassCheck == false) {
                        header("Location: signup.php?=wrongpassword");
                        exit();
                    } else if($hashedPassCheck == true) {
                        //Brugeren logges ind her
                        $_SESSION['u_email'] = $row['email'];
                        header("Location:  loggedin.php");
                        exit();
                    }
                }
            }
        }
    } else {
        header("Location: signup.php?=false");
        exit();
    }
}

function logUd() {
    //log brugeren ud ved at afbryde login sessionen
    if(isset($_POST['submit'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

function logUdKnap() {
    if(isset($_SESSION['u_email'])) {
        echo '<form action="logout.php" method="POST"> 
              <button class="btn btn-primary" type="submit" name="submit">Log ud</button>
              </form>';
      }
}
    
?>