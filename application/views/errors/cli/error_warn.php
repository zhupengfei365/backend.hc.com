<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bootflat-Admin Template</title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="favicon_16.ico"/>
        <link rel="bookmark" href="favicon_16.ico"/>
        <!-- site css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?><?php echo APPPATH ?>views/static/dist/css/site.min.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?php echo base_url(); ?><?php echo APPPATH ?>views/static/dist/js/site.min.js"></script>
        <script language="javascript" type="text/javascript"> 
        var i = 2; 
        var intervalid; 
        intervalid = setInterval("fun()", 1000); 
        function fun() { 
            if (i == 0) { 
                window.location.href = "<?php echo site_url($url) ?>"; 
                clearInterval(intervalid); 
            } 
            document.getElementById("mes").innerHTML = i; 
            i--; 
        } 
        </script>
    </head>
    <body>
        <div class="panel-body">
            <div class="content-row">
                <!--<div class="row">-->
                <div class="col-md-6">
                    <div class="alert alert-warning alert-dismissable">
                        <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                        <h4>操作失败</h4>
                        <p><?php echo $title ?></p>
                        <p>页面将在<span id="mes">3</span>秒后跳转</p>
                        <p>如果您的页面没有发生跳转，请<a class="btn btn-link" href="<?php echo site_url($url) ?>">点击这里</a></p>
                    </div>
                </div>
                <!--</div>-->
            </div>
        </div>
    </body>
</html>
