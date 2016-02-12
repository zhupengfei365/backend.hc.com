<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">商品管理</a></li>
    <li class="active">新增属性</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">新增属性<small></small></h1>
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
                <h4 class="panel-title">新增属性</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/attr/addAttrDo');?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">属性名 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="attr_name" name="attr_name" value="" placeholder="必填" data-parsley-required="true" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">是否删除 :</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_delete" value="1" id="radio-required" data-parsley-required="true" /> 是
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="is_delete" checked="checked" id="radio-required2" value="0" /> 否
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4">输入类型 :</label>
                        <div class="col-md-6 col-sm-6">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="field_type" value="0" id="radio-required" data-parsley-required="true" /> 输入
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="field_type" id="radio-required1" checked="checked" value="1" /> 单选
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="field_type" id="radio-required2" value="2" /> 多选
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">属性值 :</label>
                        <div class="col-md-6 col-sm-6" id="attr_value_div">
                            <div class="form-inline">
                                <input class="form-control" type="text" id="value_name" name="value_name[]" value="" placeholder="" data-parsley-required="true"/>
                                <a href="#" id="add_attr_btn" class="btn btn-primary m-r-5 fa fa-plus">新增</a>
                            </div>
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
<script type="text/javascript">
    $('#add_attr_btn').click(function(){
        var input = '<div class="form-inline m-t-5"><input class="form-control" type="text" id="value_name" name="value_name[]" value=""> <a href="javascript:;" id="add_attr_btn" class="btn btn-danger m-r-5 fa fa-times" onclick="delDivDom(this)"></a></div>';
        $('#attr_value_div').append(input);
    });
    function delDivDom(btn) {
        $(btn).parent('div').remove();
    }
</script>