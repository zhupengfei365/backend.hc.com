<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv='Refresh' content='<?php echo $time; ?>;URL=<?php echo $url; ?>'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() . APPPATH ?>views/static/dist/css/site.min.css">
        <title><?php echo $type == "error" ? "错误操作" : "操作成功";?></title>
    </head>

    <body>
        <div class="panel-body">
            <div class="content-row">
                <!--<div class="row">-->
                <div class="col-md-6">
                    <div class="alert <?php echo $type == "error" ? "alert-warning" : "alert-success"?> alert-dismissable">
                        <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                        <h4><?php echo $contents ?></h4>
                        <!--p><?php echo $contents ?></p-->
                        <p>页面将在<span id="cnt"><?php echo $time; ?></span>秒后跳转</p>
                        <p>如果您的页面没有发生跳转，请<a class="btn btn-link" href="<?php echo $url ?>">点击这里</a></p>
                    </div>
                </div>
                <!--</div>-->
            </div>
        </div>
        <script>
            window.onload = function () {
                var i = <?php echo $time - 1; ?>;
                setInterval(function () {
                    document.getElementById("cnt").innerHTML = i--;
                }, 1000);
            };
        </script>
    </body>
</html>