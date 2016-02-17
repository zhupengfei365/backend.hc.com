<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">基础设置</a></li>
    <li class="active">新增品牌</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">新增品牌<small></small></h1>
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
                <h4 class="panel-title">新增品牌</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/brand/addBrandDo');?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">品牌名称 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="name" name="name" value="" placeholder="必填" data-parsley-required="true" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="aliases">品牌别名 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="aliases" name="aliases" value="" placeholder="" data-parsley-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="info">品牌描述 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="info" name="info" value="" placeholder="" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="link">品牌链接 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="link" name="link" value="" placeholder="" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="breeding">育种地 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="breeding" name="breeding" value="" placeholder="" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="production">生产地 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="production" name="production" value="" placeholder="" data-parsley-required="true" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">是否显示 :</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_show" value="1" id="radio-required" checked="checked" data-parsley-required="true" /> 显示
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_show" id="radio-required2" value="0" /> 不显示
                                </label>
                            </div>
                        </div>
                    </div>
<!--                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">是否删除 :</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_delete" value="1" id="radio-required" data-parsley-required="true" /> 删除
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_delete" checked="checked" id="radio-required2" value="0" /> 不删除
                                </label>
                            </div>
                        </div>
                    </div>-->
                     <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="sort">排序 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="sort" name="sort" value="0" placeholder="0" data-parsley-required="true" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <div class="col-md-6 col-sm-6">
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