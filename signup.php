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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script>
                var colors = new Array(
                  [62,35,255],
                  [60,255,60],
                  [255,35,98],
                  [45,175,230],
                  [255,0,255],
                  [255,128,0]);

                var step = 0;
                //color table indices for: 
                // current color left
                // next color left
                // current color right
                // next color right
                var colorIndices = [0,1,2,3];

                //transition speed
                var gradientSpeed = 0.002;

                function updateGradient()
                {
  
                  if ( $===undefined ) return;
  
                var c0_0 = colors[colorIndices[0]];
                var c0_1 = colors[colorIndices[1]];
                var c1_0 = colors[colorIndices[2]];
                var c1_1 = colors[colorIndices[3]];

                var istep = 1 - step;
                var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
                var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
                var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
                var color1 = "rgb("+r1+","+g1+","+b1+")";

                var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
                var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
                var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
                var color2 = "rgb("+r2+","+g2+","+b2+")";

                 $('#gradient').css({
                   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
                    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
                  step += gradientSpeed;
                  if ( step >= 1 )
                  {
                    step %= 1;
                    colorIndices[0] = colorIndices[1];
                    colorIndices[2] = colorIndices[3];
    
                    //pick two new target color indices
                    //do not pick the same as the current one
                    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
                    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
                  }
                }

                setInterval(updateGradient,10);
        </script>
<style>


#gradient
{
  width: 100%;
  height: 100%;
  padding: 0px;
  margin: 0px;
}
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
<div class="form-group" >  
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
        <input type="submit" name="signup" value="Signup" style="background-color:#90ee90; font-size:15px; font-family:arial;"><br>
        <button type='button'  style="width:600px; height:42px; font-size:15px; border:0; background-color:#add8e6; font-family:arial;" onclick='window.open("index.php","_self")'>Login</button>
                        
    </form>

    </body>
</html>