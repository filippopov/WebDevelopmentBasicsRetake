<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"/>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar</title>

    <!-- Bootstrap -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="http://localhost:8004/Web-Development-Basics-Retake/conference/allconference">Conferences</a></li>
                <li><a href="http://localhost:8004/Web-Development-Basics-Retake/conferenceuser/allconferencesofoneuser">Your Conferences</a></li>
                <li><a href="http://localhost:8004/Web-Development-Basics-Retake/halls/allhalls">Halls</a></li>
                <li><a href="http://localhost:8004/Web-Development-Basics-Retake/status/allstatus">Status</a></li>
                <li><a href="https://github.com/filippopov/WebDevelopmentBasicsRetake"  target="_blank">GitHub Repository</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://localhost:8004/Web-Development-Basics-Retake/users/edit"><span class="glyphicon glyphicon-user"></span> <?= $model->getUsername(); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="http://localhost:8004/Web-Development-Basics-Retake/users/edit">Edit Profile</a></li>
                        <li><a href="http://localhost:8004/Web-Development-Basics-Retake/users/adminpanel">Admin Panel</a></li>
                        <li class="divider"></li>
                        <li><a href="http://localhost:8004/Web-Development-Basics-Retake/users/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>

<div class="row" style="padding: 200px">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1>Hello, <?= $model->getUsername(); ?></h1>
            </div>
        </div>
    </div>
</div>