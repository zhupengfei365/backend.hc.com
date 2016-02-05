<!--<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>用户列表</h3>
    </div>
    <div class="panel-body">
        <div class="content-row">
        <div class="row">
            <div class="col-md-12">
                <h2 class="content-row-title">Forms</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-search search-only">
                            <i class="search-icon glyphicon glyphicon-search"></i>
                            <input type="text" class="form-control search-query" id="search_text" value="<?=$searchWords?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group form-search">
                            <input type="text" class="form-control search-query">
                            <span class="input-group-btn">
                                <button data-type="last" class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="bs-example">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>用户名</th>
                            <th>邮箱</th>
                            <th>手机号</th>
                            <th>姓名</th>
                            <th>用户状态</th>
                            <th>用户组</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $k=>$row): ?>
                            <tr>
                                <td><?= $k+1 ?></td>
                                <td><?= $row['user_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['real_name'] ?></td>
                                <td><?php echo $row['status'] == 1 ? '激活' : '失效'; ?></td>
                                <td><?= $row['rolename'] ?></td>
                                <td>Table cell</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row content-row-pagination">
                <div class="col-md-12">
                    <ul class="pagination">
                        <li class=""><a href="#">PREV</a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li class="disabled"><a href="#">5</a></li>
                        <li class=""><a href="#">NEXT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function run_search() {
        var search_str = $('#search_text').val();
        url = '<?php echo site_url('backend/admin/userList');?>' + '/' + search_str;
        location.href = url;
    }
    $('#search_text').keydown(function(e){
        if(e.keyCode==13){
           run_search();
        }
    });
</script>-->


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
    <li><a href="javascript:;">首页</a></li>
    <li><a href="javascript:;">用户管理</a></li>
    <li class="active">用户列表</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">用户列表<small></small></h1>
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
                <h4 class="panel-title">Data Table - Default</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>手机号</th>
                                <th>姓名</th>
                                <th>用户状态</th>
                                <th>用户组</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $k=>$row): ?>
                            <tr class="odd gradeX">
                                <td><?= $k+1 ?></td>
                                <td><?= $row['user_name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['real_name'] ?></td>
                                <td><?php echo $row['status'] == 1 ? '激活' : '失效'; ?></td>
                                <td><?= $row['rolename'] ?></td>
                                <td><a href="#" class="btn btn-primary btn-xs m-r-5 fa fa-edit">编辑</a><a href="#" class="btn btn-primary btn-xs m-r-5 fa fa-times">删除</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-12 -->
</div>
<!-- end row -->