<?php
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');


$host = 'localhost:3306';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'login';

// Create Connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $connection = new mysqli($host, $dbusername, $dbpassword, $dbname);
} catch (Exception $exception) {
    exit('Error connecting to database');
}
$connection->set_charset('utf8mb4');

try {
    $statement = $connection->prepare("INSERT INTO login.users (email, password) values (?, ?)");
    $statement->bind_param('ss', $email, $password);
    $statement->execute();
    $statement->close();

    echo 'New record is inserted successfully';
} catch (Exception $exception) {
    echo 'Please Enter Your Login Info';
}


?>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Email</label>
        <input type="email" name="email"  required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>

<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
 
body {
    margin: 50px auto;
    text-align: center;
    width: 800px;
}
 
label {
    width: 150px;
    display: inline-block;
    font-size: 1.5rem;
    font-family: 'Tahoma';
}
 
input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}
 
form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #ccc;
    width: 500px;
    background: #eee;
}
 
div.form-element {
    margin: 20px 0;
}
 
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: yellowgreen;
    color: white;
    border: none;
}
 
p.error {
    background: orangered;
}

</style>
<?php 

?>