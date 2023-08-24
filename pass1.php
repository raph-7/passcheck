<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving the user input and storing it in the variable
    $passcheck = $_POST["passcheck"];

    // Printing the value of the password variable

    class PasswordChecker {
        public $passcheck;
    
        public function __construct($passcheck) {
            $this->passcheck = $passcheck;
        }
    
        public function checker() {
    
            $strength = 0;
    
            // check length of password
            if (strlen($this->passcheck) >= 8) {
                $strength += 30;
            }elseif(strlen($this->passcheck >= 6)) {
                $strength += 10;
            }
    
            // check for uppercase letters
            if (preg_match('/[A-Z]/', $this->passcheck)) {
                $strength += 20;
            }
    
            // check for lowercase letters
            if(preg_match('/[a-z]/', $this->passcheck)) {
                $strength += 20;
            }
    
            // chck for numbers
            if(preg_match('/\d/', $this->passcheck)) {
                $strength += 20;
            }
    
            // check for special characters
            if (preg_match('/[^A-Za-z0-9]/', $this->passcheck)) {
                $strength += 10;
            }
    
            // return result
            return 'Password Strength: '.$strength. '%';
    
        }
    }
    
    $passwordChecker = new PasswordChecker($passcheck);
    echo $passwordChecker->checker();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>checker</title>
	<link rel="stylesheet" href="style.css">
</head>
<body bgcolor="lightblue">
	
<div class="wrapper">
  <div class="title">
    <h1>Type your password below</h1>
  </div>
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <div class="contact-form">
    <div class="input-fields">
    <input type="password" id="passcheck" name="passcheck">
    </div>
    <div class="msg">
      <button type="submit" class="btn"> Check Strength </button>
    </div>
  </div>
</div>
</form>
<center><a href="index.html">Log Out</a>
</body>
</html>

