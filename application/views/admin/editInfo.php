<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">用户管理</a></li>
    <li class="active">个人设置</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">个人设置<small></small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">个人设置</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/admin/editInfoDo');?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="username">用户名 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="user_name" name="user_name" value="<?=$data['user_name']?>" placeholder="必填" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="email">邮箱 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="email" id="email" name="email" value="<?=$data['email']?>" data-parsley-type="" placeholder="必填" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="phone">手机号 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="tel" id="phone" name="phone" value="<?=$data['phone']?>" data-parsley-type="" placeholder="必填" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="real_name">真实名称 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="real_name" name="real_name" value="<?=$data['real_name']?>" data-parsley-type="" placeholder="必填" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="user_desc">用户描述 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="user_desc" name="user_desc" value="<?=$data['user_desc']?>" data-parsley-type="" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="user_id" value="<?=$data['user_id']?>">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->