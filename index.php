<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>PHP Partie7_Exo8</title>
</head>
<body>
  <?php
  /*Sur le formulaire de l'exercice 6, en plus de ce qui est demandé sur les exercices précédent,
  vérifier que le fichier transmis est bien un fichier pdf.*/
  ?>
  <?php
  if (empty($_GET['nom'])){
    ?>
    <form  action="index.php" method="get" enctype="multipart/form-data">
      <!--action = "index.php" nous permet de rediriger la page vers index.php. La methode GET nous permet de l'afficher sur la barre de recherche.  -->
      <p><label for="civilite">Civilité :</label>
        <select class="" name="civilite">
          <option value="Monsieur">Monsieur</option>
          <option value="Madame">Madame</option>
        </select>  </p>
        <p><label for="nom">Nom :</label>
          <input type="text" name="nom" value=""></p>
          <p><label for="prenom">Prénom :</label>
            <input type="text" name="prenom" value=""></p>
            <button type="submit" name="button">Submit</button>
            <input type="file" name="envoyer" value="">
          </form>
          <?php
        }else{
          $info = new SplFileInfo($_GET['envoyer']);//SplFileInfo permet de récuperer les informations d'un fichier.
          $extension = $info -> getExtension(); //-> permet d'appliquer une fonction à une variable.
          $baseName = $info -> getBasename(".$extension");// getBasename renvoie le nom de fichier modifié selon les paramettres mis dans les parentheses.
          echo 'Bonjour ' . $_GET['civilite'] . ' ' . $_GET['nom'] . ' ' . $_GET['prenom'] . '. Vous avez envoyer un fichier avec l\'extension ' . ' ' .  $extension . ' et votre fichier s\'appelle ' . $baseName;
        }
        ?>
<?php
/*
 <!-- Verification du fichier en pdf non faite, Correction de Nico V -->
 <!DOCTYPE HTML>
 <html>
 <head>
   <meta charset="utf-8">
   <title>firstPhp</title>
 </head>
 <body>
   <?php
   if (empty($_GET['lastname'] && $_GET['firstname'])) {
     ?>
     <form action="index.php" method="get" enctype="multipart/form-data">
       <label for="lastname">Nom :</label>
       <input type="text" name="lastname" value="" placeholder="Entrez votre nom">
       <label for="firstname">Prénom :</label>
       <input type="text" name="firstname" value="" placeholder="Entrez votre prénom">
       <label for="gender"></label>
       <select name="gender">
         <option value="">--Votre civilité--</option>
         <option value="homme">Homme</option>
         <option value="femme">Femme</option>
         <option value="WTF">Non-binaire</option>
       </select>
       <label for="file"></label>
       <input type="file" name="file">
       <button type="submit">Envoyez vos données</button>
     </form>
     <?php
   } else {
     ?>
     <?php
     $ext = new SplFileInfo($_GET['file']); //Sert à récupérer les informations d'un fichier envoyé
     $extension = $ext -> getExtension(); //Permet de récupérer uniquement l'extension du fichier envoyé
     $filename = $ext -> getBasename(".$extension"); //Permet de récupérer le nom du fichier, en précisant .$extension je dis que je souhaite avoir uniquement le nom du fichier sans son extension
     if ($extension == 'pdf') {
       ?>
       <p><?= 'L\'extension du fichier est bien .pdf';?></p>
       <p><?= 'Vous vous appellez ' . $_GET['lastname'] . ' ' . $_GET['firstname'] . ' et vous êtes un(e) ' . $_GET['gender'];?></p>
       <?php
     } else {
       ?>
       <p><strong><?= 'L\'extension de votre fichier doit être .pdf, vous avez envoyé un fichier en : ' . $extension . ', ' . 'Veuillez remplir à nouveau le formulaire avec un fichier comportant la bonne extension'?></strong></p>
       <form action="index.php" method="get">
         <label for="lastname">Nom :</label>
         <input type="text" name="lastname" value="" placeholder="Entrez votre nom">
         <label for="firstname">Prénom :</label>
         <input type="text" name="firstname" value="" placeholder="Entrez votre prénom">
         <label for="gender"></label>
         <select name="gender">
           <option value="">--Votre civilité--</option>
           <option value="homme">Homme</option>
           <option value="femme">Femme</option>
           <option value="WTF">Non-binaire</option>
         </select>
         <label for="file"></label>
         <input type="file" name="file" placeholder="Envoi de fichier depuis votre ordinateur">
         <button type="submit">Envoyez vos données</button>
       </form>
       <?php
     }
   }
   ?>
 </body><!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>firstPhp</title>
</head>
<body>
  <?php
  if (empty($_GET['lastname'] && $_GET['firstname'])) {
    ?>
    <form action="index.php" method="get" enctype="multipart/form-data">
      <label for="lastname">Nom :</label>
      <input type="text" name="lastname" value="" placeholder="Entrez votre nom">
      <label for="firstname">Prénom :</label>
      <input type="text" name="firstname" value="" placeholder="Entrez votre prénom">
      <label for="gender"></label>
      <select name="gender">
        <option value="">--Votre civilité--</option>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
        <option value="WTF">Non-binaire</option>
      </select>
      <label for="file"></label>
      <input type="file" name="file">
      <button type="submit">Envoyez vos données</button>
    </form>
    <?php
  } else {
    ?>
    <?php
    $ext = new SplFileInfo($_GET['file']); //Sert à récupérer les informations d'un fichier envoyé
    $extension = $ext -> getExtension(); //Permet de récupérer uniquement l'extension du fichier envoyé
    $filename = $ext -> getBasename(".$extension"); //Permet de récupérer le nom du fichier, en précisant .$extension je dis que je souhaite avoir uniquement le nom du fichier sans son extension
    if ($extension == 'pdf') {
      ?>
      <p><?= 'L\'extension du fichier est bien .pdf';?></p>
      <p><?= 'Vous vous appellez ' . $_GET['lastname'] . ' ' . $_GET['firstname'] . ' et vous êtes un(e) ' . $_GET['gender'];?></p>
      <?php
    } else {
      ?>
      <p><strong><?= 'L\'extension de votre fichier doit être .pdf, vous avez envoyé un fichier en : ' . $extension . ', ' . 'Veuillez remplir à nouveau le formulaire avec un fichier comportant la bonne extension'?></strong></p>
      <form action="index.php" method="get">
        <label for="lastname">Nom :</label>
        <input type="text" name="lastname" value="" placeholder="Entrez votre nom">
        <label for="firstname">Prénom :</label>
        <input type="text" name="firstname" value="" placeholder="Entrez votre prénom">
        <label for="gender"></label>
        <select name="gender">
          <option value="">--Votre civilité--</option>
          <option value="homme">Homme</option>
          <option value="femme">Femme</option>
          <option value="WTF">Non-binaire</option>
        </select>
        <label for="file"></label>
        <input type="file" name="file" placeholder="Envoi de fichier depuis votre ordinateur">
        <button type="submit">Envoyez vos données</button>
      </form>
      <?php
    }
  }
  ?>
</body>



*/
?>
      </body>
      </html>
