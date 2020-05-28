<?php
#calling the session variables and assinging them to variables
    session_start();
    $name = $_SESSION['name'];
    $age = $_SESSION['age'];
    $gender = $_SESSION['gender'];
    $height = $_SESSION['height'];
    $weight = $_SESSION['weight'];
    $bps = $_SESSION['bps'];
    $bpd = $_SESSION['bpd'];
    $hr = $_SESSION['hr'];
    $rr = $_SESSION['rr'];
    $ldl = $_SESSION['ldl'];
    $hdl = $_SESSION['hdl'];
    $bs = $_SESSION['bs'];
    $sleep = $_SESSION['sleep'];
    $exercise = $_SESSION['exercise'];
    $smoke = $_SESSION['smoke'];
    $db = $_SESSION['db'];
?>
<?php
#bmi calculation 
    $var=703;
    $bmi = $var*$weight/($height*$height);
    $_SESSION['bmi'] = $bmi;
?>

<?php
#If database does not exist creates
#If database does exist, calls it
    class MyDB extends SQLite3 {
    function __construct() {
        #this is where we need to specify a different folder?
        $this->open('tracker.db');}}
        $db = new MyDB();
    if(!$db) {
        echo $db->lastErrorMsg();} 
        else {
            echo "Opened database successfully\n";}
?>

<?php
#Connects to Tracker database
#inserts user inputted variables and calculated BMI into the database
      $sql =<<<EOF
      INSERT INTO tracker (NAME, AGE, GENDER, HEIGHT, WEIGHT, BMI, BPS, BPD, HR, RR, LDL, HDL, SUGAR, SLEEP, EXERCISE, SMOKE)
      VALUES ('$name',$age,'$gender',$height,$weight,$bmi,$bps,$bpd,$hr,$rr,$ldl,$hdl,$bs,$sleep,$exercise,$smoke);
      EOF;
       $ret = $db->exec($sql);
        if(!$ret) {
        echo $db->lastErrorMsg();} 
        else {
        echo "Records created successfully\n";}
?>

<?php
#redirects to other webpage
    header("Location: http://localhost/web/quitsmoking2.php");
?>