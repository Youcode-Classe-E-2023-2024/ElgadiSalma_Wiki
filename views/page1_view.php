<?php
if(!isset($_SESSION['id_user'])){
    header("location:index.php?page=login");
}
?>
<!-- user -->
<?php
if(isset($_SESSION['role']) && $_SESSION['role'] === 0)
{
?>
<h1>SALAAAM ANA USER </h1>
<!-- end user -->


<!-- admin -->
<?php
}
if(isset($_SESSION['role']) && $_SESSION['role'] === 1)
{
?>
<h1>salam ana admin , dashboard ghaybano fiha les statistiques</h1>
<?php } ?>
<!-- end admin -->