<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/ionRangeSlider/css/ion.rangeSlider.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/ionRangeSlider/css/ion.rangeSlider.skinNice.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="<?php echo base_url() . APPPATH ?>views/static/dropzone/dist/dropzone.css" rel="stylesheet" />
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">基础设置</a></li>
    <li class="active">分类编辑</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">分类编辑<small></small></h1>
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
                <h4 class="panel-title">分类编辑</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/category/editCateDo');?>" method="post">
<!--                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="parent_id">父分类 :</label>
                        <div class="col-md-4">
                            <select class="default-select2 form-control" name="parent_id">
                                <option <?php if($info['parent_id'] == 0) { echo "selected";}?> value="0">顶级分类</option>
                                <?php foreach($parent_cate as $n):?>
                                <option <?php if($info['parent_id'] == $n['category_id']) { echo "selected";}?> value="<?=$n['category_id']?>"><?= $n['name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="name">分类名 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="name" name="name" value="<?=$info['name']?>" placeholder="必填" data-parsley-required="true" required/>
                            <input type="hidden" name="category_id" value="<?=$info['category_id']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="name_alias">分类别名 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="name_alias" name="name_alias" value="<?=$info['name_alias']?>" placeholder="" data-parsley-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="description">分类描述 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="description" name="description" value="<?=$info['description']?>" placeholder="" data-parsley-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="icon">分类图标 :</label>
                        <div class="col-md-6 col-sm-6 form-inline">
                            <div id="dropzone" class="dropzone col-md-8 col-sm-8 ">
                            </div>
                            <input type="hidden" id="icon" name="icon" value="<?=$info['icon']?>" />
                            <input type="button" id="icon_button" value="上传" class="btn btn-primary">
                            <div class="alert alert-warning col-md-3 col-sm-3">* 只能上传一张图片,点击上传才会上传至服务器</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="icon">移动端分类图标 :</label>
                        <div class="col-md-6 col-sm-6 form-inline">
                            <div id="mdropzone" class="dropzone col-md-8 col-sm-8 ">
                            </div>
                            <input type="hidden" id="m_icon" name="m_icon" value="<?=$info['m_icon']?>" />
                            <input type="button" id="micon_button" value="上传" class="btn btn-primary">
                            <div class="alert alert-warning col-md-3 col-sm-3">* 只能上传一张图片,点击上传才会上传至服务器</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">是否显示 :</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_show" value="1" id="radio-required" <?php if($info['is_show'] == 1) echo "checked='checked'";?> data-parsley-required="true" /> 显示
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_show" <?php if($info['is_show'] == 0) echo "checked='checked'";?> id="radio-required2" value="0" /> 不显示
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">导航显示 :</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="show_in_nav" value="1" id="radio-required" <?php if($info['show_in_nav'] == 1) echo "checked='checked'";?> data-parsley-required="true" /> 显示
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="show_in_nav" <?php if($info['show_in_nav'] == 0) echo "checked='checked'";?> id="radio-required2" value="0" /> 不显示
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="sort">排序 :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="sort" name="sort" value="<?=$info['sort']?>" placeholder="0" data-parsley-required="true"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">分类属性 :</label>
                        <div class="col-md-6 col-sm-6" id="attr_value_div">
                            <?php foreach($attr_list as $k=>$v):?>
<!--                            <div class="form-inline">
                                <input type="checkbox" name="attr_id[]" ////<?php if($v['checked']) {echo 'checked';}?> value="<?=$v['attr_id']?>" /> <?=$v['name']?>
                                -------是否为筛选条件
                                <label>
                                    <input type="radio" name="status////<?=$v['attr_id']?>" <?php if($v['checked'] && $v['is_search']==1) {echo 'selected';}?> value="1" id="radio-required" data-parsley-required="true" /> 是
                                </label>
                                <label>
                                    <input type="radio" name="status////<?=$v['attr_id']?>" <?php if($v['checked'] && $v['is_search']==0) {echo 'selected';}?> value="1" id="radio-required" data-parsley-required="true" /> 否
                                </label>
                            </div>-->
                            <?php endforeach;?>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>属性</th>
                                        <th>是否为筛选条件</th>
                                        <th>是否为必填属性</th>
                                        <th>排序</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($attr_list as $k=>$v):?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="attr_id[]" <?php if($v['checked']) {echo 'checked';}?> value="<?=$v['attr_id']?>" /> <?=$v['name']?>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="status<?=$v['attr_id']?>" <?php if($v['checked'] && $v['is_search']==1) {echo "checked='checked'";}?> value="1" id="radio-required" data-parsley-required="true" /> 是
                                            </label>
                                            <label>
                                                <input type="radio" name="status<?=$v['attr_id']?>" <?php if($v['checked'] && $v['is_search']==0) {echo "checked='checked'";}?> value="0" id="radio-required" data-parsley-required="true" /> 否
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="is_require<?=$v['attr_id']?>" <?php if($v['checked'] && $v['is_require']==1) {echo "checked='checked'";}?> value="1" id="radio-required" data-parsley-required="true" /> 是
                                            </label>
                                            <label>
                                                <input type="radio" name="is_require<?=$v['attr_id']?>" <?php if($v['checked'] && $v['is_require']==0) {echo "checked='checked'";}?> value="0" id="radio-required" data-parsley-required="true" /> 否
                                            </label>
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="sort<?=$v['attr_id']?>" value="<?=$v['sort']?>"/>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
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
<script src="<?php echo base_url() . APPPATH ?>views/static/dropzone/dist/dropzone.js"></script>
<script>
    $(document).ready(function() {
        FormPlugins.init();
    });
    
    $("#dropzone").dropzone({
        url: '<?php echo site_url('backend/image/uploadIcon'); ?>',
        parallelUploads: 1,
        paramName: "file",
        maxFilesize: 2,
        maxFiles: 1,
        autoProcessQueue: false,
        addRemoveLinks : true,
        dictRemoveFile: '移除文件',
        dictDefaultMessage: '点击或拖拽文件上传',
        dictMaxFilesExceeded: '只能上传{{maxFiles}}张图片',
        init: function() {
            this.on("success", function(file, res){
                res = JSON.parse(res);
                if (res.status != 0) {
                    alert(res.desc);
                } else {
                    $('#icon').val(res.name);
                }
                console.log(res);
            });
            this.on("removedfile", function(file){
                $('#icon').val('');
            });
            var _this = this;
//            var uploadedFiles = [{"name": "\u667a\u80fd\u786c\u4ef6.jpg", "path": "http:\/\/backend.hc.com\/uploads\/20120708173719-1087458132.jpg", "type": "image\/jpeg", "id": 1, "index": 1}];
            var uploadedFiles = <?= $cate_icon ?>;
            if (uploadedFiles.length) {
                uploadedFiles = uploadedFiles.slice(0, 1);
                var _files = [];
                var _i = uploadedFiles.length;
                $.each(uploadedFiles, function (key, value) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', value.path, true);
                    xhr.setRequestHeader('Accept', 'image/png,image/*;q=0.8,*/*;q=0.5');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.responseType = 'arraybuffer';
                    xhr.onload = function (e) {
                        if (this.status === 200 || this.status === 304) {
                            var file = new Blob([this.response], {type: value.type});
                            file.name = value.name;
                            _files[key] = file;
                            _i--;
                            if (_i == 0) {
                                $.each(uploadedFiles, function (key, value) {
                                    _this.addFile.call(_this, _files[key], {id: value.id, index: value.index, path: value.path});
                                });
                            }
                        }
                    };
                    xhr.send(null);
                });
            }
            $('#icon_button').on('click', function(){
               _this.processQueue();
            });
        },
    });

    $("#mdropzone").dropzone({
        url: '<?php echo site_url('backend/image/uploadIcon'); ?>',
        parallelUploads: 1,
        paramName: "file",
        maxFilesize: 2,
        maxFiles: 1,
        autoProcessQueue: false,
        addRemoveLinks : true,
        dictRemoveFile: '移除文件',
        dictDefaultMessage: '点击或拖拽文件上传',
        dictMaxFilesExceeded: '只能上传{{maxFiles}}张图片',
        init: function() {
            this.on("success", function(file, res){
                res = JSON.parse(res);
                if (res.status != 0) {
                    alert(res.desc);
                } else {
                    $('#m_icon').val(res.name);
                }
                console.log(res);
            });
            this.on("removedfile", function(file){
                $('#m_icon').val('');
            });
            var _this = this;
//            var uploadedFiles = [{"name": "\u667a\u80fd\u786c\u4ef6.jpg", "path": "http:\/\/backend.hc.com\/uploads\/20120708173719-1087458132.jpg", "type": "image\/jpeg", "id": 1, "index": 1}];
            var uploadedFiles = <?= $mcate_icon ?>;
            if (uploadedFiles.length) {
                uploadedFiles = uploadedFiles.slice(0, 1);
                var _files = [];
                var _i = uploadedFiles.length;
                $.each(uploadedFiles, function (key, value) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', value.path, true);
                    xhr.setRequestHeader('Accept', 'image/png,image/*;q=0.8,*/*;q=0.5');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.responseType = 'arraybuffer';
                    xhr.onload = function (e) {
                        if (this.status === 200 || this.status === 304) {
                            var file = new Blob([this.response], {type: value.type});
                            file.name = value.name;
                            _files[key] = file;
                            _i--;
                            if (_i == 0) {
                                $.each(uploadedFiles, function (key, value) {
                                    _this.addFile.call(_this, _files[key], {id: value.id, index: value.index, path: value.path});
                                });
                            }
                        }
                    };
                    xhr.send(null);
                });
            }
            $('#micon_button').on('click', function(){
               _this.processQueue();
            });
        },
    });
</script>