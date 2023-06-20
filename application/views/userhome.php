<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
 $arr=$_SESSION['data_session'];
require_once __DIR__.'./includes/header.php'; ?>
<h2> hhi <?php
        echo $arr['username'];
?>!</h2>
<?php require_once __DIR__.'./includes/footer.php'; ?>
