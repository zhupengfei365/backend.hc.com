<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">基础设置</a></li>
    <li class="active">商品分类</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">商品分类<small></small></h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">商品分类</h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo site_url('backend/category/addCate');?>" class="btn btn-primary m-r-5 m-b-5 fa fa-plus">新增分类</a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>分类名</th>
                                <th>分类ID</th>
                                <th>是否显示</th>
                                <th>在导航显示</th>
                                <th>分类别名</th>
                                <th>排序</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $k => $row): ?>
                                <tr class="odd gradeX">
                                    <td><?= $k + 1 ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['category_id'] ?></td>
                                    <td><?php echo $row['is_show'] == 1 ? '显示' : '不显示'; ?></td>
                                    <td><?php echo $row['show_in_nav'] == 1 ? '显示' : '不显示'; ?></td>
                                    <td><?= $row['name_alias'] ?></td>
                                    <td><?= $row['sort'] ?></td>
                                    <td>
                                        <a href="<?php echo site_url('backend/category/editCate') . '/' . $row['category_id'] ;?>" class="btn btn-info btn-xs m-r-5 fa fa-edit">编辑</a>
                                        <?php if ($row['is_delete'] == 0    ) { ?>
                                            <a href="#" class="btn btn-danger btn-xs m-r-5 fa fa-times" data-id="<?=$row['category_id']?>">删除</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- #modal-dialog -->
                <div class="modal fade" id="modal-dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">提示</h4>
                            </div>
                            <div class="modal-body">
                                您确认要删除此分类么？
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">否</a>
                                <a href="javascript:;" class="btn btn-sm btn-success" id="modal_submit">是</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<!--<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/DataTables/js/dataTables.autoFill.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/js/table-manage-autofill.demo.min.js"></script>-->
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
//    $(document).ready(function () {
//        TableManageAutofill.init();
//    });
    
    $('.btn-danger').click(function(){
        var id = $(this).attr('data-id');
        var delUrl = '<?php echo site_url('backend/category/delCate');?>/' + id;
        $('#modal_submit').attr('href', delUrl);
        $("#modal-dialog").modal();
    });
</script>