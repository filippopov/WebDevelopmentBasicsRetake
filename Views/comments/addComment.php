<?php if($model->error === true): ?>
    <div class="alert alert-dismissible alert-danger">
        <button class="close" type="button" data-dismiss="alert">x</button>
        An error occurred</div>
<?php elseif($model->success === true): ?>

    <div class="alert alert-dismissible alert-success">
        <button class="close" type="button" data-dismiss="alert">x</button>
        Successfully Add Comment
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/css/bootstrap.min.css"/>
    <!-- Bootstrap -->

    <link rel="stylesheet" type="text/css" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/css/prettify.css"/>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/src/bootstrap-wysihtml5.css"/>
    <link rel="stylesheet" type="text/css" href="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/css/wysiwyg-color.css"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
</head>
<body>
<br/>
<div class="container">

    <div class="jumbotron">
        <form method="post">
        <h1>WYSIWYG Text Editor</h1>
        <textarea class="textarea" style="width:100%;height:300px;" name="comment" id="comment"></textarea>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" name="add-comment" value="Add-Comment" id="add-comment" />
                    <a href="http://localhost:8004/Web-Development-Basics-Retake/comments/allcomments/0" type="button" class="btn btn-success">Back to Comments</a>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/wysihtml5-0.3.0.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/jquery-1.7.2.min.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/prettify.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/src/bootstrap-wysihtml5.js"></script>
<script src="https://rawgit.com/jhollingworth/bootstrap-wysihtml5/master/lib/js/bootstrap-button.js"></script>

<script>
    $('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
    $(prettyPrint);
</script>
</body>
</html>

