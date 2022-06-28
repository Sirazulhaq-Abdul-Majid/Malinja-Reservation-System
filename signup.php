<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malinja room reservation system registration</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="register/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="register/css/style.css">
<style>

body {
  font-size: 13px;
  line-height: 1.8;
  color: #222;
  font-weight: 400;
  background: #282828;
  padding: 20px 0; }

.container{
    width: 1200px;
  position: relative;
  margin bottom: 5px;
  background: #fff; 
}

.register-form {
  padding: 20px 50px 10px 500px; }

.form-row {
  margin: 0 -10px; }
  .form-row .form-group {
    width: 50%;
    padding: 0 10px; }

.form-group {
  margin: 0 20px;
  margin-bottom: -17px;
  position: relative; }

label {
  font-size: 14px;
  font-weight: bold;
  font-family: 'Montserrat';
  margin-bottom: 2px;
  display: block; }

</style>
</head>
    <body>
    <div class="main">
    <div class="container">
    <div class="signup-content">
    <div class="signup-img">
    <img src="resources/ora.jpg" alt="" style="height:99%">
    </div>
    <div class="signup-form">
   
      
        <form method="POST" action="php/adduser.php">
<div class="form-group">  
<H3><b>STUDENT REGISTRATION</b></H3>
</div>  
        
        <div class="form-group">  
        <?php
                if (isset($_GET['error'])):?>
                        <div style='color:red'><?php echo $_GET['error'];?></div>
                <?php endif ?>
                <?php if (isset($_GET['success'])):?>
                <div style='color:green'><?php echo $_GET['success'];?></div>
        <?php endif ?>
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>
    </div>
        
    <div class="form-row">
    <div class="form-group">
        <label for="username">Student ID</label>
        <input type="text" id="username" name="username"><br>
    </div>
    <div class="form-group" style="margin-left:-15px;">
        <label for="password">Password</label>
        <input type="text" id="password" name="password"><br>
    </div>
</div>
<div class="form-row">
<div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value=1>Male</option>
            <option value=2>Female</option>
        </select><br>
</div>
<div class="form-group" style="margin-left:-15px;" >
        <label for="telephone">Telephone</label>
        <input type="text" id="telephone" name="telephone"><br>
</div>
</div> 
<div class="form-group">
        <label for="address">Address</label>
        <input type="text" id="address" name="address"><br>
</div>

<div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email"><br>
</div>

<div class="form-group">
        <label for="dependant_name">Dependant name</label>
        <input type="text" id="dependant_name" name="dependant_name"><br>
</div>
<div class="form-row">
<div class="form-group">    
        <label for="dependant_ic">Dependant IC</label>
        <input type="text" id="dependant_ic" name="dependant_ic"><br>
</div>
<div class="form-group" style="margin-left:-15px;">
        <label for="dependant_telephone">Dependant telephone</label>
        <input type="text" id="dependant_telephone" name="dependant_telephone"><br>
</div></div>
<div class="form-group">
        <label for="dependant_address">Dependant address</label>
        <input type="text" id="dependant_address" name="dependant_address"><br>
</div>        
<div class="form-group">
        <label for="dependant_email">Dependant email</label>
        <input type="text" id="dependant_email" name="dependant_email"><br>
</div>
<div class="form-group">
        <label for="dependant_relationship">Dependant relationship</label>
        <select name="dependant_relationship" id="dependant_relationship">
            <option value="parent">Parent</option>
            <option value="guardian">Guardian</option>
</select><br>
</div>
        
        <br>
        <input type="submit" name="signup" value="signup">
       
    </form>

    </body>
</html>