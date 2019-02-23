<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="GPAstyle.css">

</head>
<body>
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


    <div id = "profile">
        <center>
        <h1>
        Hello
        </h1>
            <?php
                session_start();
                $firstName = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $university = $_POST['university'];
                $year = $_POST['year'];
                echo "<h4>Name :&nbsp".$firstName."&nbsp&nbsp&nbsp".$lastname."</h4>";
                echo "<h4>Year :&nbsp".$year."&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUniversity : ".$university."</h4>";
                echo "<h4>Email :&nbsp".$email."</h4>";
                
            ?>
        </center>
        
    </div>
    <center>
        <table class="table table-dark">
        <thead>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Credit</th>
                <th>grade</th>
            </tr>
        </thead>
        <tbody id="table">
        <?php
        $file = fopen(basename($_FILES["fileToUpload"]["name"]),"r");
         $subjectID = array();
         $subjectName = array();
         $credit = array();
         $grade = array();
         $total_credit = 0;
         $total_gXc = 0;
         $gpa = 0;
         $i = 0;
         while(($row = fgetcsv($file,0,","))!== FALSE) {
         if($i!==0){
             $subjectID[] = $row[0];
             $subjectName[] = $row[1];
             $credit[] = $row[2];
             $grade[] = $row[3];
         }
         $i++;
        }
         $arrlength = count($subjectID);
         for($j = 0; $j < $arrlength; $j++){
                echo "<tr>";
                echo "<td> $subjectID[$j]";
                echo "<td>$subjectName[$j]";
                echo "<td>$credit[$j]";
                echo "<td>$grade[$j]";
                echo "</tr>";
            $total_credit += $credit[$j];
            $total_gXc += $grade[$j] * $credit[$j];
         }         
        $gpa = $total_gXc / $total_credit;
        ?>
           </tbody>
    </table>
        </center>
    <?php 
      echo "<p>"."Total credit = ".$total_credit."&nbsp&nbsp&nbspG.P.A. = ".$gpa."</p>";
    ?>
</body>
</html>