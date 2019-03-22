<?php require('database.php'); /*
on appelle notre fichier de config */
$id = null;
 if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }
  if (null == $id) { header("location:index.php"); }
   else { /*on lance la connection et la requete*/
    $pdo = Database ::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM etudiant where id =?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
}




/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        	<link href="css/bootstrap.min.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
    </head>

    <body>

<br />
<div class="container">


<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Edition</h3>
<p>

</div>
<p>



<br />
<div class="form-horizontal" >

<br />
<div class="control-group">
                        <label class="control-label">Name</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['name']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Firstname</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['firstname']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Email Address</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['email']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Phone</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['tel']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Pays</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['pays']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Metier</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['metier']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Url</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['url']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="control-group">
                        <label class="control-label">Comment</label>

<br />
<div class="controls">
                            <label class="checkbox">
                                <?php echo $data['comment']; ?>
                            </label>
</div>
<p>

</div>
<p>


<br />
<div class="form-actions">
                        <a class=" btn btn-success" href="index.php">Back</a>
</div>
<p>



</div>
<p>

</div>
<p>


</div>
<p>
<!-- /container -->
    </body>
   
    </html>