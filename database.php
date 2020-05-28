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
 $sql =<<<EOF
      CREATE TABLE IF NOT EXISTS tracker
     (NAME      TEXT            NOT NULL,
      AGE       INT             NOT NULL,
      GENDER    TEXT            NOT NULL,
      HEIGHT    DECIMAL(10,2)   NOT NULL,
      WEIGHT    DECIMAL(10,2)   NOT NULL,
      BMI       DECIMAL(10,2)   NOT NULL,
      BPS       INT             NOT NULL,
      BPD       INT             NOT NULL,
      HR        INT             NOT NULL,
      RR        INT             NOT NULL,
      LDL       INT             NOT NULL,
      HDL       INT             NOT NULL,
      SUGAR     INT             NOT NULL,
      SLEEP     DECIMAL(10,2)   NOT NULL,
      EXERCISE  DECIMAL(10,2)   NOT NULL,
      SMOKE     INT             NOT NULL);
EOF;
 
 $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
?>

<?php
 $sql1 =<<<EOF
      CREATE TABLE IF NOT EXISTS lowvalues
     (BMI       DECIMAL(10,2)   NOT NULL,
      BPS       INT             NOT NULL,
      BPD       INT             NOT NULL,
      HR        INT             NOT NULL,
      RR        INT             NOT NULL,
      HDL       INT             NOT NULL,
      SUGAR     INT             NOT NULL,
      SLEEP     DECIMAL(10,2)   NOT NULL,
      EXERCISE  DECIMAL(10,2)   NOT NULL);
EOF;
 
 $ret1 = $db->exec($sql1);
   if(!$ret1){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
 $sql1 =<<<EOF
      INSERT INTO lowvalues (BMI,BPS,BPD,HR,RR,HDL,SUGAR,SLEEP,EXERCISE)
      SELECT 18.5, 90, 60, 60, 12, 45, 80, 6.0, 0.5
        WHERE NOT EXISTS (SELECT BMI FROM lowvalues WHERE BMI = 25.0);
EOF;

   $ret1 = $db->exec($sql1);
   if(!$ret1) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
?>
<?php
 $sql2 =<<<EOF
      CREATE TABLE IF NOT EXISTS highvalues
     (BMI       DECIMAL(10,2)   NOT NULL,
      BPS       INT             NOT NULL,
      BPD       INT             NOT NULL,
      HR        INT             NOT NULL,
      RR        INT             NOT NULL,
      LDL       INT             NOT NULL,
      SUGAR     INT             NOT NULL,
      SLEEP     DECIMAL(10,2)   NOT NULL,
      SMOKE     INT             NOT NULL);
EOF;
 
 $ret2 = $db->exec($sql2);
   if(!$ret2){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   
    $sql2 =<<<EOF
      INSERT INTO highvalues (BMI,BPS,BPD,HR,RR,LDL,SUGAR,SLEEP,SMOKE)
      SELECT 25.0, 120, 80, 100, 18, 100, 130, 10.0, 1
        WHERE NOT EXISTS (SELECT BMI FROM highvalues WHERE BMI = 25.0);
EOF;

   $ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
?>

<?php
session_start();
$_SESSION['db'] = $db;
?>
<?php
#redirects to other webpage
    header("Location: http://localhost/web/connect.php");
?>