<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">权限管理</a></li>
    <li class="active">导航管理</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">导航管理</h1>
<!-- end page-header -->

<!-- begin row -->
<div class="row">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-7">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">导航管理</h4>
            </div>
            <div class="panel-body">
                <a href="<?php echo site_url('backend/menu/addMenu');?>" class="btn btn-primary m-r-5 m-b-5 fa fa-plus">新增导航</a>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>导航</th>
                                <th>节点</th>
                                <th>排序</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $l): ?>
                                <tr>
                                    <td><span class="fa fa-align-left">&nbsp;</span><?= $l['title'] ?></td>
                                    <td>&nbsp;</td>
                                    <td><?= $l['sort'] ?></td>
                                    <td><?php
                                        if ($l['status'] == 1) {
                                            echo "显示";
                                        } else {
                                            echo "隐藏";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('backend/menu/editMenu') . '/' . $l['id']; ?>" class="btn btn-info btn-xs m-r-5 fa fa-edit">编辑</a>
                                        <?php if ($l['status'] == 1) { ?>
                                            <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 fa fa-times" data-toggle="modal" data-id="<?= $l['id'] ?>">删除</a>
                                        <?php } ?>
                                        <a href="<?php echo site_url('backend/menu/addMenu') . '/' . $l['id']; ?>" class="btn btn-primary btn-xs m-r-5 fa fa-plus">新增子导航</a>
                                    </td>
                                </tr>
                                <?php foreach($l['menu_son'] as $s) :?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-chain">&nbsp;</span><?= $s['title'] ?></td>
                                    <td><?= $s['dirc'] . '/' . $s['cont'] . '/' . $s['func']?></td>
                                    <td><?= $s['sort'] ?></td>
                                    <td>
                                        <?php
                                        if ($s['status'] == 1) {
                                            echo "显示";
                                        } else {
                                            echo "隐藏";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                       <a href="<?php echo site_url('backend/menu/editMenu') . '/' . $s['id']; ?>" class="btn btn-info btn-xs m-r-5 fa fa-edit">编辑</a>
                                        <?php if ($s['status'] == 1) { ?>
                                            <a href="javascript:;" class="btn btn-danger btn-xs m-r-5 fa fa-times" data-toggle="modal" data-id="<?= $s['id'] ?>">删除</a>
                                        <?php } ?> 
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
                            您确认要隐藏此导航么？
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
<script>
    $('.btn-danger').click(function(){
        var id = $(this).attr('data-id');
        var delUrl = '<?php echo site_url('backend/menu/delMenu');?>/' + id;
        $('#modal_submit').attr('href', delUrl);
        $("#modal-dialog").modal();
    });
</script>