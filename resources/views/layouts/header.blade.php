<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Rhino</a>
            </div>
            <ul class="nav navbar-nav">
              
         
                <li class="active"><a href="{{URL::to('/')}}">Add Order Detail </a></li>
              
                <li><a href="{{URL::to('view-order')}}">View Order Detail</a></li>
          

            </ul>
            
        </div>
    </nav>

    <div class="container">
        <div class='alert alert-danger' id="div_errors">
        </div>
       

        <div class="alert alert-success" id="div_success" >
      
        </div>
      