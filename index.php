
<?php
# slaga utf-8 encoding za da raboti kirilica
mb_internal_encoding('UTF-8');

$pageTitle = 'Форма';
include 'includes/header.php';
if( key_exists('is_logged',$_SESSION) && $_SESSION['is_logged']==1){ 
         header('Location: home.php');
         die;
}
#proverka dali $_POST ne e prazno 
if ($_POST) {
    //echo '<pre>' . print_r($_FILES, true) . '</pre>';
   
    #maha prazni intervali ' '
    $name = trim($_POST['name']);

    #ako sumata e 2,33 to trq se transformira v 2.33
    $pass = trim($_POST['pass']);

    $error = false; # po default nqma greshki    
    # $name dali e po malko ot 4 simvola
    if ($name != 'user') {

        #izpisvame greshkata
        echo '<p>Не валидно име</p>';

        #otbelqzvame 4e ima greshka
        $error = true;
    }

    # dali $sum da ne e po malko ili ravno na 0
    if ($pass != 'qwerty') {
        echo '<p>Не валидна парола</p>';

//otbelqzvame 4e ima greshka
        $error = true;
    }
      
    #proverka dalli ima namerena greshka
    if (!$error) {

        $_SESSION['is_logged']  = 1;
        header('location: upload.php');
    }
    else{
        $_SESSION['is_logged']  = 0;
    } 
}
?>
<a href=>Форма за вход</a> 
<form method="POST" enctype="multipart/form-data">    
    <div>Име<input type="text"name="name"/></div>
    <div>Парола<input type="text"name="pass"/></div>
    <div>
       
    </div>
    <div>
        <input type="submit" value="Login"/>
    </div>
</form>
<?php
include 'includes/footer.php';
?>
    