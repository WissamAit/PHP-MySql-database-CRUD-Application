  <?php require 'database.php';
   $id = null; 
   if ( !empty($_GET['id'])) { $id = $_REQUEST['id']; } 
   if ( null==$id ) { header("Location: index.php"); } 
   if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) { 

    /* on initialise nos erreurs*/
       $nameError = null;
       $firstnameError = null;
       $ageError = null;
       $telError = null;
       $emailError = null; 
       $paysError = null; 
       $commentError = null; 
       $metierError = null; 
       $urlError = null;


        /* On assigne nos valeurs*/ 
        $name = $_POST['name']; 
        $firstname = $_POST['firstname']; 
        $age = $_POST['age']; 
        $tel = $_POST['tel']; 
        $email = $_POST['email']; 
        $pays = $_POST['pays']; 
        $comment = $_POST['comment']; 
        $metier = $_POST['metier']; 
        $url = $_POST['url'];


        /*On verifie que les champs sont remplis*/ 
        $valid = true;
         if (empty($name)) { $nameError = 'Please enter Name'; $valid = false; } 
         if (empty($firstname)) { $firstnameError = 'Please enter firstname'; $valid = false; }
         if (empty($email)) { $emailError = 'Please enter Email Address'; $valid = false; }
         else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $emailError = 'Please enter a valid Email Address'; $valid = false; } 
         if (empty($age)) { $ageError = 'Please enter your age'; $valid = false; } 
         if (empty($tel)) { $telError = 'Please enter phone'; $valid = false; } 
         if (!isset($pays)) { $paysError = 'Please select a country'; $valid = false; } 
         if (empty($comment)) { $commentError = 'Please enter a description'; $valid = false; } 
         if (!isset($metier)) { $metierError = 'Please select a job'; $valid = false; } 
         if (empty($url)) { $urlError = 'Please enter website url'; $valid = false; }


          /*mise à jour des donnés*/
   if ($valid)
        {$pdo = Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
                $sql = "UPDATE etudiant SET name = ?,firstname = ?,age = ?,tel = ?, email = ?, pays = ?, comment = ?, metier = ?, url = ? WHERE id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($name,$firstname, $age, $tel, $email,$pays,$comment, $metier, $url,$id));
                Database::disconnect();
                header("Location: index.php");
            } 
           }
           else {

                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM etudiant where id = ?";
                $q = $pdo->prepare($sql);
                $q->execute(array($id));
                $data = $q->fetch(PDO::FETCH_ASSOC);
                $name = $data['name'];
                $firstname = $data['firstname'];
                $age = $data['age'];
                $tel = $data['tel'];
                $email = $data['email'];
                $pays = $data['pays'];
                $comment = $data['comment'];
                $metier = $data['metier'];
                $url = $data['url'];
                Database::disconnect();
            }
        
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crud-Update</title>
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

    </head>
    <body>
     

<br />
<div class="container">

<br />
<div class="row">

<br />
<h3>Modifier un contact</h3>
<p>

</div>
<p>

<br />
<form method="post" action="update.php?id=<?php echo $id ;?>">

<br />
<div class="control-group <?php echo!empty($nameError) ? 'error' : ''; ?>">
                    <label class="control-label">Name</label>

<br />
<div class="controls">
                        <input name="name" type="text"  placeholder="Name" value="<?php echo!empty($name) ? $name : ''; ?>">
                        <?php if (!empty($nameError)): ?>
                            <span class="help-inline"><?php echo $nameError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($firstnameError) ? 'error' : ''; ?>">
                    <label class="control-label">firstname</label>

<br />
<div class="controls">
                        <input type="text" name="firstname" value="<?php echo!empty($firstname) ? $firstname : ''; ?>">
                        <?php if (!empty($firstnameError)): ?>
                            <span class="help-inline"><?php echo $firstnameError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="control-group<?php echo!empty($ageError) ? 'error' : ''; ?>">
                    <label class="control-label">age</label>

<br />
<div class="controls">
                        <input type="number" name="age" value="<?php echo!empty($age) ? $age : ''; ?>">
                        <?php if (!empty($ageError)): ?>
                            <span class="help-inline"><?php echo $ageError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($emailError) ? 'error' : ''; ?>">
                    <label class="control-label">Email Address</label>

<br />
<div class="controls">
                        <input name="email" type="text" placeholder="Email Address" value="<?php echo!empty($email) ? $email : ''; ?>">
                        <?php if (!empty($emailError)): ?>
                            <span class="help-inline"><?php echo $emailError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($telError) ? 'error' : ''; ?>">
                    <label class="control-label">Telephone</label>

<br />
<div class="controls">
                        <input name="tel" type="text" placeholder="Telephone" value="<?php echo!empty($tel) ? $tel : ''; ?>">
                        <?php if (!empty($telError)): ?>
                            <span class="help-inline"><?php echo $telError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group<?php echo!empty($paysError) ? 'error' : ''; ?>">
                    <select name="pays">

<option value="paris">Paris</option>

<option value="londres">Londres</option>

<option value="amsterdam">Amsterdam</option>

</select>
                    <?php if (!empty($paysError)): ?>
                        <span class="help-inline"><?php echo $paysError; ?></span>
                    <?php endif; ?>
</div>
<p>



<br />
<div class="control-group<?php echo!empty($metierError) ? 'error' : ''; ?>">
                    <label class="checkbox-inline">Metier</label>

<br />
<div class="controls">
                        Dev : <input type="checkbox" name="metier" value="dev" <?php if (isset($metier) && $metier == "dev") echo "checked"; ?>>
                        Integrateur <input type="checkbox" name="metier" value="integrateur" <?php if (isset($metier) && $metier == "integrateur") echo "checked"; ?>>
                        Reseau <input type="checkbox" name="metier" value="reseau" <?php if (isset($metier) && $metier == "reseau") echo "checked"; ?>>
</div>
<p>

                    <?php if (!empty($metierError)): ?>
                        <span class="help-inline"><?php echo $metierError; ?></span>
                    <?php endif; ?>
</div>
<p>



<br />
<div class="control-group  <?php echo!empty($urlError) ? 'error' : ''; ?>">
                    <label class="control-label">Siteweb</label>

<br />
<div class="controls">
                        <input type="text" name="url" value="<?php echo!empty($url) ? $url : ''; ?>">
                        <?php if (!empty($urlError)): ?>
                            <span class="help-inline"><?php echo $urlError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>



<br />
<div class="control-group <?php echo!empty($commentError) ? 'error' : ''; ?>">
                    <label class="control-label">Commentaire </label>

<br />
<div class="controls">
                        <textarea rows="4" cols="30" name="comment" ><?php if (isset($comment)) echo $comment; ?></textarea>    
                        <?php if (!empty($commentError)): ?>
                            <span class="help-inline"><?php echo $commentError; ?></span>
                        <?php endif; ?>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                    <input type="submit" class="btn btn-success" name="submit" value="submit">
                    <a class="btn btn-warning" href="index.php">Retour</a>
</div>
<p>

            </form>
<p>



</div>
<p>


    </body>
</html>