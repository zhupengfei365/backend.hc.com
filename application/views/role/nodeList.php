<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">权限管理</a></li>
    <li class="active">节点列表</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">节点列表<small></small></h1>
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
                <h4 class="panel-title">节点列表</h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo site_url('backend/role/addNode');?>" class="btn btn-primary m-r-5 m-b-5 fa fa-plus">新增节点</a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>节点</th>
                                <th>节点描述</th>
                                <th>节点状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $k => $row): ?>
                                <tr class="odd gradeX">
                                    <td><?= $k + 1 ?></td>
                                    <td><?= $row['dirc'] . '/' . $row['cont'] . '/' . $row['func'] ?></td>
                                    <td><?= $row['memo'] ?></td>
                                    <td><?php echo $row['status'] == 1 ? '正常' : '停用'; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('backend/role/editNode') . '/' . $row['id'];?>" class="btn btn-info btn-xs m-r-5 fa fa-edit">编辑</a>
                                        <?php if ($row['status'] == 1) {?>
                                        <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 fa fa-times" data-toggle="modal" data-id="<?=$row['id']?>">删除</a>
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
                                您确认要禁用此节点么？
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
        var delUrl = '<?php echo site_url('backend/role/delNode');?>/' + id;
        $('#modal_submit').attr('href', delUrl);
        $("#modal-dialog").modal();
    });
</script>