
<!DOCTYPE html>
<html lang="en">
<head>

<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin/logout.php">Logout</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a href="user/index.php">homepage</a></li>
        
        <li><a href="admin/index.php">Admin</a></li>
        <li><a href="upload.php">Upload</a></li>
         <li><a href="profile.php">profile pictures</a></li>
        <form>
<input type="text" size="30" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>
        
      </ul>
      
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


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



<!-- 
<?php
//$dossier = 'uploads/';
//$fichier = basename($_FILES['profile']['name']);
//$taille_maxi = 100000;
//$taille = filesize($_FILES['profile']['tmp_name']);
//$extensions = array('.png', '.gif', '.jpg', '.jpeg');
//$extension = strrchr($_FILES['profile']['name'], '.'); 
//Début des vérifications de sécurité...
//if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
  //   $erreur = 'wrong file type';
}
//if($taille>$taille_maxi)
{
//     $erreur = 'file too big';
}
//if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
    // $fichier = strtr($fichier, 
        //  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
         // 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    // $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    // if(move_uploaded_file($_FILES['profile']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
         // echo 'success !';
     }
    // else //Sinon (la fonction renvoie FALSE).
     {
        //  echo 'try again';
     }
}
//else
{
    // echo $erreur;
}
?> -->
