<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>商品管理系统</title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="favicon_16.ico"/>
        <link rel="bookmark" href="favicon_16.ico"/>
         site css 
        <link rel="stylesheet" href="<?php echo base_url() . APPPATH ?>views/static/dist/css/site.min.css">

         HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. 
        [if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]
        <script type="text/javascript" src="<?php echo base_url() . APPPATH ?>views/static/dist/js/site.min.js"></script>
    </head>
    <body>
        nav
        <nav role="navigation" class="navbar navbar-custom">
            <div class="container-fluid">
                 Brand and toggle get grouped for better mobile display 
                <div class="navbar-header">
                    <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">商品管理系统</a>
                </div>

                 Collect the nav links, forms, and other content for toggling 
                <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Getting Started</a></li>
                        <li class="active"><a href="#">Documentation</a></li>
                        <li class="disabled"><a href="#">Link</a></li> 
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this->session->userdata('realName'); ?> <b class="caret"></b></a>
                            <ul role="menu" class="dropdown-menu">
                                <li class="dropdown-header">Setting</li>
                                <li><a href="#">Action</a></li>
                                <li class="divider"></li>
                                <li class="active"><a href="#">Separated link</a></li>
                                <li class="divider"></li>
                                <li class="disabled"><a href="<?php echo site_url('backend/user/logout'); ?>">Signout</a></li>
                            </ul>
                        </li>
                    </ul>

                </div> /.navbar-collapse 
            </div> /.container-fluid 
        </nav>-->

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>商品管理系统</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">-->
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/css/style-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/DataTables/css/data-table.css" rel="stylesheet" />
    <link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade in page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> 商品管理系统</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form full-width">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Enter keyword" />
								<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
							</div>
						</form>
					</li>
					<li class="dropdown">
						<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
							<i class="fa fa-bell-o"></i>
							<span class="label">5</span>
						</a>
						<ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/img/user-1.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
						</ul>
					</li>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/img/user-13.jpg" alt="" /> 
							<span class="hidden-xs"><?php echo $this->session->userdata('realName'); ?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li><a href="javascript:;">Edit Profile</a></li>
							<li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
							<li><a href="javascript:;">Calendar</a></li>
							<li><a href="javascript:;">Setting</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo site_url('backend/user/logout'); ?>">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->