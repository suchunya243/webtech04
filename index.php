<!DOCTYPE html>
<html lang="en">
<head>
    <title>Basic PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link href="https://fonts.googleapis.com/css?family=Overlock" rel="stylesheet">
          <link rel="stylesheet" href="indexstyle.css">
</head>
<body >
    <?php
    // define variables and set to empty values
    $nameErr = $lastnameErr = $emailErr = $yearErr = $universityErr = "";
    $firstname = $lastname = $email = $year = $university = "";
      session_start();
      $_SESSION['firstname'] = $firstname;
      $_SESSION['lastname'] = $lastname;
      $_SESSION['email'] = $email;
      $_SESSION['university'] = $university;
      $_SESSION['year'] = $year;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["firstname"])) {
            $nameErr = "First Name is required";
        } else {
            $firstname = test_input($_POST["firstname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
                $nameErr = "Only letters and white space allowed"; 
            }
        }

        if (empty($_POST["lastname"])) {
            $lastnameErr = "Last Name is required";
        } else {
            $lastname = test_input($_POST["lastname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
                $lastnameErr = "Only letters and white space allowed"; 
            }
        }
      
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }
          
        if (empty($_POST["university"])) {
            $universityErr = "university is required";
        } else {
            $university = test_input($_POST["university"]);
            // check if university only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$university)) {
              $universityErr = "Only letters and white space allowed"; 
            }
        }

        if (empty($_POST["year"])) {
            $yearErr = "year is required";
        } else {
            $year = test_input($_POST["year"]);
        }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="head1">
      <a class="navbar-brand" href="#" id="namePage" >GPA<br>calculator</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="index.php" >Home <span class="sr-only">(current)</span></a>
          <a class="nav-link" href="form.csv" download>Download CSV form</a>
        </div>
      </div>
    </nav>

    <h2 id="head">Welcome to GPA calculator</h2>
    <div id="box">
      <br><br>
     
    <form enctype="multipart/form-data" action="gpa.php" method="post"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      First Name: <input type="text" name="firstname" id="firstname" value="<?php echo $firstname;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>
      Last Name:  <input type="text" name="lastname" id="lastname" value="<?php echo $lastname;?>">
      <span class="error">* <?php echo $lastnameErr;?></span>
      <br><br>
      Email: <input type="email" name="email" id="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>      
      <br><br>
      University: <input type="text" name="university" id="university" value="<?php echo $university;?>">
      <span class="error">* <?php echo $universityErr;?></span>
      <br><br>
      Year:
      <input type="radio" name="year" checked <?php if (isset($year) && $year=="1") echo "checked";?> value="1">1
      <input type="radio" name="year" <?php if (isset($year) && $year=="2") echo "checked";?> value="2">2
      <input type="radio" name="year" <?php if (isset($year) && $year=="3") echo "checked";?> value="3">3 
      <input type="radio" name="year" <?php if (isset($year) && $year=="4") echo "checked";?> value="4">4
      <span class="error"> <?php echo $yearErr;?></span>
      <br>
      <div class="form-group col-md-6 col-sm-12">
          <div class="custom-file">
            <input type="file" accept="text/csv" required="" class="custom-file-input" name="fileToUpload" id="filepath" 
          data-toggle="tooltip" data-placement="bottom" title="*File name must not contain special character." 
          onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
            <label class="custom-file-label" for="filepath" style="font-weight: normal">Choose File</label>
          </div>
            <small id="passwordHelpInline" class="text-muted">
              <span style="-webkit-text-fill-color: red">*.csv file only.</span>
            </small>
      </div>
      <br>
        <input type="submit" class="btn btn-light" value="submit">    
    </form>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="indexscript.js"></script>
</body>
</html>
