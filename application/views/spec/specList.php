<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">基础设置</a></li>
    <li class="active">规格列表</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">规格列表<small></small></h1>
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
                <h4 class="panel-title">规格列表</h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo site_url('backend/spec/addSpec');?>" class="btn btn-primary m-r-5 m-b-5 fa fa-plus">新增规格</a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>规格名</th>
                                <th>规格值</th>
                                <th>添加时间</th>
                                <th>修改时间</th>
                                <th>是否删除</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $k => $row): ?>
                                <tr class="odd gradeX">
                                    <td><?= $k + 1 ?></td>
                                    <td><?= $row['name'].'('.$row['remark'].')' ?></td>
                                    <td><?= $row['value_name']?></td>
                                    <td><?= date('Y-m-d H:i:s', $row['add_time']) ?></td>
                                    <td><?= date('Y-m-d H:i:s', $row['update_time']) ?></td>
                                    <td><?php if ($row['is_delete'] == 1) {echo '<span class="badge badge-danger">是</span>';} else {echo '<span class="badge badge-success">否</span>';}?></td>
                                    <td>
                                        <a href="<?php echo site_url('backend/spec/editSpec') . '/' . $row['spec_id'];?>" class="btn btn-info btn-xs m-r-5 fa fa-edit">编辑</a>
                                        <?php if ($row['is_delete'] == 0) {?>
                                        <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 fa fa-times" data-toggle="modal" data-id="<?=$row['spec_id']?>">删除</a>
                                        <?php }?>
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
                                您确认要删除此规格么？
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
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/DataTables/js/dataTables.autoFill.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/js/table-manage-autofill.demo.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<script>
    $(document).ready(function () {
        TableManageAutofill.init();
    });
    
    $('.btn-danger').click(function(){
        var id = $(this).attr('data-id');
        var delUrl = '<?php echo site_url('backend/spec/delSpec');?>/' + id;
        $('#modal_submit').attr('href', delUrl);
        $("#modal-dialog").modal();
    });
</script>