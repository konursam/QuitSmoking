<html>
    <head>
        <title>My Health Log</title>
        <h1>My Health Log</h1>
        <p>Be your best self!</p>
    </head>
    <body>
<?php
#This section of code validates the form
#Checks for alphabetical characters for the text inputs
#Checks for numerical characters for the integer inputs
#Checks for decimal characters for hte decimal inputs
#also saves the variables into session
#also resets the form when reset button is clicked
    session_start();
    $name = $age = $gender = $height = $weight = $bps = $bpd = $hr = $rr = $ldl = $hdl = $bs = $sleep = $exercise = $smoke = "";
    $nameErr = $ageErr = $genderErr = $heightErr = $weightErr = $bpsErr = $bpdErr = $hrErr = $rrErr = $ldlErr = $hdlErr = $bsErr = $sleepErr = $exerciseErr = $smokeErr = "";
    if($_POST['submit']=='RESET') $_POST = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valid = true;
    if(empty($_POST['name'])){
        $nameErr = "Name is required";
        $valid = false;}
        else{
            $name=test_input($_POST['name']);}
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
                $valid = false;}
    if(empty($_POST['age'])){
        $ageErr = "Age is required";
        $valid = false;}
        else{
            $age = test_input($_POST['age']);}
            if (!preg_match("/^[0-9]*$/", $age)) {
                $ageErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['age']) < 0){
                    $ageErr = "Age value too low";
                    $valid = false;}
                    if (($_POST['age']) > 120){
                        $ageErr = "Age value too high";
                        $valid = false;}
    if(empty($_POST['gender'])){
        $genderErr = "Gender is required";
        $valid = false;}
        else{
            $gender = test_input($_POST['gender']);}
    if(empty($_POST['height'])){
        $heightErr = "Height is required";
        $valid = false;}
        else{
            $height = test_input($_POST['height']);}
            if (!preg_match("/^[0-9.]*$/", $height)) {
                $heightErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['height']) < 24){
                    $heightErr = "Height is too low";
                    $valid = false;}
                    if (($_POST['height']) > 96){
                        $heightErr = "Height is too high";
                        $valid = false;}
    if(empty($_POST['weight'])){
        $weightErr = "Weight is required";
        $valid = false;}
        else{
            $weight = test_input($_POST['weight']);}
            if (!preg_match("/^[0-9.]*$/", $weight)){
                $weightErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['weight']) < 10){
                    $weightErr = "Weight is too low";
                    $valid = false;}
                    if (($_POST['weight']) > 700){
                        $weightErr = "Weight is too high";
                        $valid = false;}
    if(empty($_POST['bps'])){
        $bpsErr = "Systolic blood pressure is required";
        $valid = false;}
        else{
            $bps = test_input($_POST['bps']);}
            if (!preg_match("/^[0-9]*$/", $bps)) {
                $bpsErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['bps']) < 60){
                    $bpsErr = "Blood Pressure is too low";
                    $valid = false;}
                    if (($_POST['bps']) > 250){
                        $bpsErr = "Blood Pressure is too high";
                        $valid = false;}
    if(empty($_POST['bpd'])){
        $bpdErr = "Diastolic blood pressure is required";
        $valid = false;}
        else{
            $bpd = test_input($_POST['bpd']);}
            if (!preg_match("/^[0-9]*$/", $bpd)) {
                $bpdErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['bpd']) < 30){
                    $bpdErr = "Blood Pressure is too low";
                    $valid = false;}
                    if (($_POST['bpd']) > 140){
                        $bpdErr = "Blood Pressure is too high";
                        $valid = false;}
    if(empty($_POST['hr'])){
        $hrErr = "Heart rate is required";
        $valid = false;}
        else{
            $hr = test_input($_POST['hr']);}
            if (!preg_match("/^[0-9]*$/", $hr)) {
                $hrErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['hr']) < 30){
                    $hrErr = "Heart Rate is too low";
                    $valid = false;}
                    if (($_POST['hr']) > 200){
                        $hrErr = "Heart Rate is too high";
                        $valid = false;}
    if(empty($_POST['rr'])){
        $rrErr = "Respiratory rate is required";
        $valid = false;}
        else{
            $rr = test_input($_POST['rr']);}
            if (!preg_match("/^[0-9]*$/", $rr)) {
                $rrErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['rr']) < 5){
                    $rrErr = "Respiratory Rate is too low";
                    $valid = false;}
                    if (($_POST['rr']) > 30){
                        $rrErr = "Respiratory Rate is too high";
                        $valid = false;}
    if(empty($_POST['ldl'])){
        $ldlErr = "LDL is required";
        $valid = false;}
        else{
            $ldl = test_input($_POST['ldl']);}
            if (!preg_match("/^[0-9]*$/", $ldl)) {
                $ldlErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['ldl']) < 50){
                    $ldlErr = "LDL is too low";
                    $valid = false;}
                    if (($_POST['ldl']) > 250){
                        $ldlErr = "LDL is too high";
                        $valid = false;}
    if(empty($_POST['hdl'])){
        $hdlErr = "HDL is required";
        $valid = false;}
        else{
            $hdl = test_input($_POST['hdl']);}
            if (!preg_match("/^[0-9]*$/", $hdl)) {
                $hdlErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['hdl']) < 10){
                    $hdlErr = "HDL is too low";
                    $valid = false;}
                    if (($_POST['hdl']) > 150){
                        $hdlErr = "HDL is too high";
                        $valid = false;}
    if(empty($_POST['bs'])){
        $bsErr = "Blood Sugar is required";
        $valid = false;}
        else{
            $bs = test_input($_POST['bs']);}
            if (!preg_match("/^[0-9]*$/", $bs)) {
                $bsErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['bs']) < 30){
                    $bsErr = "Blood Sugar is too low";
                    $valid = false;}
                    if (($_POST['bs']) > 300){
                        $bsErr = "Blood Sugar is too high";
                        $valid = false;}
    if(($_POST['sleep'])==''){
        $sleepErr = "Hours of sleep is required";
        $valid = false;}
        else{
            $sleep = test_input($_POST['sleep']);}
            if (!preg_match("/^[0-9.]*$/", $sleep)) {
                $sleepErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['sleep']) > 24){
                    $sleepErr = "Sleep Time is too high";
                    $valid = false;}
    if(($_POST['exercise'])==''){
        $exerciseErr = "Hours of exercise is required";
        $valid = false;}
        else{
            $exercise = test_input($_POST['exercise']);}
            if (!preg_match("/^[0-9.]*$/", $exercise)) {
                $exerciseErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['exercise']) > 12){
                    $exerciseErr = "Exercise Time is too high";
                    $valid = false;}
    if(($_POST['smoke'])==''){
        $smokeErr = "Number of cigarettes smoked is required";
        $valid = false;}
        else{
            $smoke = test_input($_POST['smoke']);}
            if (!preg_match("/^[0-9]*$/", $smoke)) {
                $smokeErr = "Only numbers allowed";
                $valid = false;}
                if (($_POST['smoke']) > 60){
                    $smokeErr = "Number of Cigarettes Smoked is too high";
                    $valid = false;}
    if($valid == true){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $_POST['gender'];
        $_SESSION['height'] = $_POST['height'];
        $_SESSION['weight'] = $_POST['weight'];
        $_SESSION['bps'] = $_POST['bps'];
        $_SESSION['bpd'] = $_POST['bpd'];
        $_SESSION['hr'] = $_POST['hr'];
        $_SESSION['rr'] = $_POST['rr'];
        $_SESSION['ldl'] = $_POST['ldl'];
        $_SESSION['hdl'] = $_POST['hdl'];
        $_SESSION['bs'] = $_POST['bs'];
        $_SESSION['sleep'] = $_POST['sleep'];
        $_SESSION['exercise'] = $_POST['exercise'];
        $_SESSION['smoke'] = $_POST['smoke'];
        header('location:database.php');}}
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;}
?>
<?php 
#This next section is the user input form
#When the form is submitted and there is an error, it holds onto the values that the user had inputted previously
#The submit button redirects to connect.php
#The reset button clears the form
?>
        <form method='post' action="">
            <table style="width: 75%; font_family:arial;">
                <colgroup>
                    <col span="1" style="width: 2%;">
                    <col span="1" style="width: .1%;">
                    <col span="1" style="width: 6%;">
                </colgroup>
                <tbody
                    <tr>
                        <td>Name: </td>
                        <td></td>
                        <td><input name='name' type='text' value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Age: </td>
                        <td></td>
                        <td><input name='age' type='text' value="<?php echo $age;?>"><span class="error">* <?php echo $ageErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td></td>
                        <td><input type="radio" name="gender"
                            <?php   if (isset($gender) && $gender=="female") echo $gender;?> 
                                value="female">Female
                        <input type="radio" name="gender" 
                            <?php if (isset($gender) && $gender=="male") echo $gender;?> 
                                value="male">Male
                        <input type="radio" name="gender" 
                            <?php if (isset($gender) && $gender=="other") echo $gender;?> 
                                value="other">Other<span class="error">* <?php echo $genderErr;?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Height (in):</td> 
                        <td><img width=25 height=25 src='https://image.flaticon.com/icons/png/512/1417/1417225.png'></td>
                        <td><input name='height' type='text' value="<?php echo $height;?>"><span class="error">* <?php echo $heightErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Weight (lbs):</td> 
                        <td><img width=25 height=25 src='https://png.pngtree.com/svg/20161017/weight_407329.png'></td>
                        <td><input name='weight' type='text' value="<?php echo $weight;?>"><span class="error">* <?php echo $weightErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Blood Pressure (systolic):</td> 
                        <td><img width=25 height=25 src='https://static.thenounproject.com/png/699132-200.png'></td>
                        <td><input name='bps' type='text' value="<?php echo $bps;?>"><span class="error">* <?php echo $bpsErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Blood Pressure (diastolic):</td> 
                        <td><img width=25 height=25 src='https://static.thenounproject.com/png/699132-200.png'></td>
                        <td><input name='bpd' type='text' value="<?php echo $bpd;?>"><span class="error">* <?php echo $bpdErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Heart Rate:</td> 
                        <td><img width=25 height=25 src='https://cdn2.iconfinder.com/data/icons/web-and-technology-3/512/technology__web__heart__rate_-512.png'></td>
                        <td><input name='hr' type='text' value="<?php echo $hr;?>"><span class="error">* <?php echo $hrErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Respiratory Rate:</td> 
                        <td><img width=25 height=25 src='https://cdn3.iconfinder.com/data/icons/organs-5/512/lungs-512.png'></td>
                        <td><input name='rr' type='text' value="<?php echo $rr;?>"><span class="error">* <?php echo $rrErr;?></span></td>
                    </tr>
                    <tr>
                        <td>LDL:</td> 
                        <td><img width=25 height=25 src='https://image.flaticon.com/icons/svg/1546/1546125.svg'></td>
                        <td><input name='ldl' type='text' value="<?php echo $ldl;?>"><span class="error">* <?php echo $ldlErr;?></span></td>
                    </tr>
                    <tr>
                        <td>HDL:</td> 
                        <td><img width=25 height=25 src='https://image.flaticon.com/icons/svg/1546/1546125.svg'></td>
                        <td><input name='hdl' type='text' value="<?php echo $hdl;?>"><span class="error">* <?php echo $hdlErr;?></span></td>
                    </tr>
                    <tr>
                        <td>Blood Sugar:</td> 
                        <td><img width=25 height=25 src='https://library.kissclipart.com/20180904/wjq/kissclipart-blood-sugar-test-icon-clipart-blood-sugar-diabetes-fb9441c379fc3651.png'></td>
                        <td><input name='bs' type='text' value="<?php echo $bs;?>"><span class="error">* <?php echo $bsErr;?></span></td>
                    </tr>
                    <tr>
                        <td>How many hours did you sleep last night?</td> 
                        <td><img width=25 height=25 src='https://cdn2.iconfinder.com/data/icons/sleepless-night-flat/64/sleep-night-bedroom-moon-rest-512.png'></td>
                        <td><input name='sleep' type='text' value="<?php echo $sleep;?>"><span class="error">* <?php echo $sleepErr;?></span></td>
                    </tr>
                    <tr>
                        <td>How many hours did you exercise today?</td> 
                        <td><img width=25 height=25 src='https://cdn1.iconfinder.com/data/icons/healthy-life-3/66/33-512.png'></td>
                        <td><input name='exercise' type='text' value="<?php echo $exercise;?>"><span class="error">* <?php echo $exerciseErr;?></span></td>
                    </tr>
                    <tr>
                        <td>How many cigarettes did you smoke today?</td> 
                        <td><img width=25 height=25 src='https://previews.123rf.com/images/dxinerz/dxinerz1712/dxinerz171202176/91976169-lit-cigarette-icon.jpg'></td>
                        <td><input name='smoke' type='text' value="<?php echo $smoke;?>"><span class="error">* <?php echo $smokeErr;?></span></td>
                    </tr>
                    <br>
                    <br>
                </tbody>
            </table>
            <p>* = Required Field</p>
            <input type='submit' name='submit' value='SUBMIT' onclick="window.location.href =('Location:http://localhost/web/database.php')"> 
            <input type='submit' name='submit' value='RESET')">
        </form>      
    </body>
</html>