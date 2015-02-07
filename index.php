<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/tinfoil.css" rel="stylesheet">


<?php

/*
http://tinfoil.bodaegl.com/api/all
*/

$json_data = file_get_contents ( "http://tinfoil.bodaegl.com/api/all" );



$data_array = json_decode( $json_data );
    
$data_array = $data_array->requests;

$dump = print_r( $data_array, TRUE );



$title_all_string = "";

foreach ($data_array as $data_item) {
    $title_all_string .= $data_item->title . " ";
}

$title_all_array = explode(" ", $title_all_string);



$title_count_array = array();
foreach ($title_all_array as $title_all_item) {
    if ( array_key_exists( $title_all_item, $title_count_array )  ) {
        $title_count_array[$title_all_item]++;
        
    } else {
        $title_count_array[$title_all_item] = 1;
    
    }
}

arsort($title_count_array);

#echo "<pre>" . print_r( $title_count_array, TRUE ) . "</pre>";

$title_count_array_trim = array_slice($title_count_array, 0, 10);

?>




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tinfoil Hat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
        
        
        
          <h2 class="sub-header">Word Counts</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Word</th>
                  <th>Count</th>
                </tr>
              </thead>
              <tbody>        
              <?php
              foreach ($title_count_array_trim as $title_text => $title_count) {
                ?>
                <tr>
                  <td><?php echo $title_text; ?></td>
                  <td><?php echo $title_count ?></td>  
                </tr>                         
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>              
              
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>
          
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>body</th>
                  <th>body_req_id</th>
                  <th>id</th>
                  <th>title</th>
                  <th>type</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($data_array as $data_item) {
                ?>
                <tr>
                  <td><?php echo $data_item->body; ?></td>
                  <td><?php echo $data_item->body_req_id ?></td>
                  <td><?php echo $data_item->id ?></td>
                  <td><?php echo $data_item->title ?></td>
                  <td><?php echo $data_item->type ?></td>    
                </tr>                         
                <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

