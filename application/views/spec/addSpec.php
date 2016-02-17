<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">基础设置</a></li>
    <li class="active">新增规格</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">新增规格<small></small></h1>
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
                <h4 class="panel-title">新增规格</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/spec/addSpecDo');?>" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="spec_name">规格名 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="spec_name" name="spec_name" value="" placeholder="必填" data-parsley-required="true" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="remark">备注 * :</label>
                        <div class="col-md-6 col-sm-6">
                            <input class="form-control" type="text" id="remark" name="remark" value="" placeholder="必填" data-parsley-required="true" required/>
                        </div>
                    </div>
<!--                    <div class="form-group">
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
                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4" for="fullname">规格值 :</label>
                        <div class="col-md-6 col-sm-6" id="spec_value_div">
                            <div class="form-inline">
                                <input class="form-control m-t-5" type="text" id="value_name" name="value_name[]" value="" placeholder="必填" data-parsley-required="true" required/>
                                <a href="#" id="add_spec_btn" class="btn btn-primary m-r-5 fa fa-plus">新增</a>
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
    $('#add_spec_btn').click(function(){
        var input = '<div class="form-inline m-t-5"><input class="form-control" type="text" id="value_name" name="value_name[]" value="" placeholder="必填" required> <a href="javascript:;" id="add_spec_btn" class="btn btn-danger m-r-5 fa fa-times" onclick="delDivDom(this)"></a></div>';
        $('#spec_value_div').append(input);
    });
    function delDivDom(btn) {
        $(btn).parent('div').remove();
    }
</script>