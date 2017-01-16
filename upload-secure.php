<?php
$dossier = 'uploads/';
$fichier = basename($_FILES['profile']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['profile']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['profile']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'wrong file type';
}
if($taille>$taille_maxi)
{
     $erreur = 'file too big';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'success !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'try again';
     }
}
else
{
     echo $erreur;
}
?>


<?php
if(isset($_FILES['profile']))
{ 
     $dossier = 'uploads/';
     $fichier = basename($_FILES['profile']['name']);
     if(move_uploaded_file($_FILES['profile']['tmp_name'], $dossier . $fichier)) 
     {
          echo 'Success !';
 
     }
     else 
     {
          echo 'try again';
     }
}
?>