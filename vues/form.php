<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="../vues/assets/style/form.css">
</head>
<body>
    <div class="container">
        <h1>Administration</h1>

        <h2>Se connecter</h2>
        <form action="" method="post">
           <center>
           <div class="form-group"><br>
                <label for="email">Email :</label>
                <input type="email" placeholder="user@email.com"  name="email" required>
            </div>

            <div class="form-group">
                <label for="message">Mot de passe :</label>
                <input  type="password" placeholder="mot de passe" name="mdp" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Envoyer">
            </div>
           </center>
         
          
        </form>
    </div>
</body>
</html>
