<?php
  include('inc/menu.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Finance Business - About Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">

        <!-- Header -->
        <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
              <li><a href="#"><i class="fa fa-clock-o"></i>Mon-Fri 09:00-17:00</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>090-080-0760</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Finance Business</h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <?php
         if(isset($_GET['status']) && $_GET['status'] == 'admin'){
              $pages = array("Domov"=>'index.php?status=admin', "About Us"=>'about.php?status=admin','Our Services'=>'services.php?status=admin',"Contact Us"=>"contact.php?status=admin","Reviews"=>"reviews_page.php?status=admin","adminpanel"=>'admin.php?status=admin');
              echo(get_menu($pages));
            }
            elseif(isset($_GET['status']) && $_GET['status'] == 'success'){
              $pages = array("Domov"=>'index.php?status=success', "About Us"=>'about.php?status=success','Our Services'=>'services.php?status=success',"Contact Us"=>"contact.php?status=success","Reviews"=>"reviews_page.php?status=success");
              echo(get_menu($pages));
            }else{
      $pages = array("Domov"=>'index.php', "About Us"=>'about.php','Our Services'=>'services.php',"Contact Us"=>"contact.php","Reviews"=>"reviews.php");
      echo(get_menu($pages));
            }
    ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

<!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
  </head>