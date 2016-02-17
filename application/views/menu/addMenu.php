<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">权限管理</a></li>
    <li class="active">添加导航</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">添加导航<small></small></h1>
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
                <h4 class="panel-title">添加导航</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/menu/addMenuDo');?>" method="post">
                    <?php if($pid != 0) {?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="p_id">父级导航 * :</label>
                        <div class="col-md-4">
                            <select class="default-select2 form-control" name="p_id">
                                <?php foreach($menu_list as $m):?>
                                <option <?php if($pid == $m['id']) {echo "selected";}?> value="<?=$m['id']?>"><?= $m['title']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <?php } else {?>
                    <input type="hidden" name="p_id" value="0">
                    <?php }?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="title">导航名称 * :</label>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" type="text" id="title" name="title" value="" placeholder="必填" data-parsley-required="true" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="title">导航图标 :</label>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" type="text" id="icon_name" name="icon_name" value="" placeholder="" data-parsley-required="true"/>
                        </div>
                    </div>
                    <?php if($pid != 0) {?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="node_id">挂接节点 * :</label>
                        <div class="col-md-4">
                            <select class="default-select2 form-control" name="node_id">
                                <option value="">请选择节点</option>
                                <?php foreach($node_list as $n):?>
                                <option value="<?=$n['id']?>"><?= $n['dirc'] . '/' . $n['cont'] . '/' . $n['func']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <?php } else {?>
                    <input type="hidden" name="node_id" value="0">
                    <?php }?>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="sort">排序 * :</label>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" type="text" id="sort" name="sort" data-parsley-type="" value="0" placeholder="" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">状态 :</label>
                        <div class="col-md-4 col-sm-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" value="1" id="radio-required" checked="checked" data-parsley-required="true" /> 启用
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="status" id="radio-required2" value="0" /> 停用
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4"></label>
                        <div class="col-md-4 col-sm-4">
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
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/masked-input/masked-input.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/password-indicator/js/password-indicator.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-daterangepicker/moment.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/js/form-plugins.demo.min.js"></script>
<script>
    $(document).ready(function() {
        FormPlugins.init();
    });
</script>