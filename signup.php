<html>
    <body>
        <fieldset>
        <form method="POST" action="php/adduser.php">
            
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>
        <label for="username">Student ID</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password</label>
        <input type="text" id="password" name="password"><br>
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value=1>Male</option>
            <option value=2>Female</option>
</select><br>
        <label for="address">Address</label>
        <input type="text" id="address" name="address"><br>
        <label for="email">E-mail</label>
        <input type="text" id="email" name="email"><br>
        <label for="telephone">Telephone</label>
        <input type="text" id="telephone" name="telephone"><br>
        <label for="dependant_ic">Dependant IC</label>
        <input type="text" id="dependant_ic" name="dependant_ic"><br>
        <label for="dependant_name">Dependant name</label>
        <input type="text" id="dependant_name" name="dependant_name"><br>
        <label for="dependant_telephone">Dependant telephone</label>
        <input type="text" id="dependant_telephone" name="dependant_telephone"><br>
        <label for="dependant_address">Dependant address</label>
        <input type="text" id="dependant_address" name="dependant_address"><br>
        <label for="dependant_email">Dependant email</label>
        <input type="text" id="dependant_email" name="dependant_email"><br>
        <label for="dependant_relationship">Dependant relationship</label>
        <select name="dependant_relationship" id="dependant_relationship">
            <option value="parent">Parent</option>
            <option value="guardian">Guardian</option>
</select><br>
        
        <input type='submit' name="signup">Signup
    </form>
</fieldset>
    </body>
</html>