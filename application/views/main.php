<?php $this->load->view('header'); ?>
<!--header-->

<!--sidebar-->
<?php $this->load->view('sidebar', array("menu"=>$this->get_menu));?>
<!-- content -->
<div id="content" class="content">
    <?php echo $this->output->get_output();?>
</div><!-- content -->
<?php $this->load->view('footer'); ?>
