<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="<?php echo base_url() . APPPATH ?>views/static/color_admin/admin/assets/img/user-13.jpg" alt="" /></a>
                </div>
                <div class="info">
                    <?php echo $this->session->userdata('realName'); ?>
                    <small>Front end developer</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <?php foreach ($menu as $k=>$row):?>
            <?php if ($row['is_show'] == 1) {?>
            <li class="has-sub <?php foreach($row['child'] as $s) { if($this->uri->uri_string == $s['uri'] || (!empty($_COOKIE['menu_url']) && $_COOKIE['menu_url']==site_url($s['uri']))){ echo "active"; break;}}?>">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa <?=$row['icon_name']?>"></i>
                    <span><?=$row['title']?></span>
                </a>
                <ul class="sub-menu">
                    <?php foreach ($row['child'] as $s):?>
                    <li <?php if($this->uri->uri_string == $s['uri'] || (!empty($_COOKIE['menu_url']) && $_COOKIE['menu_url']==site_url($s['uri']))){ echo "class='active'";} ?>><a href="<?php echo site_url($s['uri']);?>" onclick="setMenu(this)"><?=$s['title']?></a></li>
                    <?php endforeach;?>
                </ul>
            </li>
            <?php }?>
            <?php endforeach;?>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
<script type="text/javascript">
    function setMenu(url) {
        $.cookie('menu_url', url, {path:"/"});
    }
</script>