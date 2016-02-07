<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">权限管理</a></li>
    <li class="active">授权节点</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">授权节点</h1>
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
                <h4 class="panel-title">授权节点</h4>
            </div>
            <div class="panel-body panel-form">
                <form class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form" action="<?php echo site_url('backend/role/editAuthDo'); ?>" method="post">
                    <div class="table-responsive">
                        <table class="table table-bordered">
<!--                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr>
                                    <?php foreach($data as $d):?>
                                        <?php foreach($d['child'] as $k=>$c):?>
                                    <td><input type="checkbox" name="node_id[]" <?php if($c['checked']) echo "checked";?> value="<?=$c['id']?>" /> <?=$c['cont'].'/'.$c['func'] . ' ' . $c['memo']?></td>
                                        <?php $k++;if($k!=0 && $k%5 == 0) {?>
                                        </tr><tr>
                                        <?php }?>
                                        <?php endforeach;?>
                                        <?php if (count($d['child']) < 5 || count($d['child']) % 5 != 0){?>
                                            <?php for($i=0;$i<(5-count($d['child'])%5);$i++) {?>
                                            <td>&nbsp;</td>
                                            <?php }?>
                                            </tr><tr>
                                        <?php }?>
                                    <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <!--<label class="control-label col-md-4 col-sm-4"></label>-->
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="role_id" value="<?=$role_id?>">
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>   
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row -->