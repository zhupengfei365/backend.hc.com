<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
    <ul class="list-group panel">
        <?php foreach ($list as $row):?>
        <li>
            <a href="#demo3" class="list-group-item " data-toggle="collapse"><?=$row['title']?><span class="glyphicon glyphicon-chevron-right"></span></a>
            <div class="collapse" id="demo3">
                <?php foreach ($row['menu_son'] as $s):?>
                <a href="javascript:;" class="list-group-item"><?=$s['title']?></a>
                <?php endforeach;?>
                <a href="#SubMenu1" class="list-group-item" data-toggle="collapse">Subitem 1  <span class="glyphicon glyphicon-chevron-right"></span></a>
                <a href="javascript:;" class="list-group-item">Subitem 2</a>
                <a href="javascript:;" class="list-group-item">Subitem 3</a>
            </div>
        </li>
        <?php endforeach;?>
        <li>
            <a href="#demo4" class="list-group-item " data-toggle="collapse">Item 4  <span class="glyphicon glyphicon-chevron-right"></span></a>
        <li class="collapse" id="demo4">
            <a href="" class="list-group-item">Subitem 1</a>
            <a href="" class="list-group-item">Subitem 2</a>
            <a href="" class="list-group-item">Subitem 3</a>
        </li>
        </li>
    </ul>
</div>