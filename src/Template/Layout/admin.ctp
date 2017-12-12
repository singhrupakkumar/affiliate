<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->fetch('title') ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <?= $this->Html->css(array('custom/bootstrap.min.css', 'custom/font-awesome.min.css', 'custom/ionicons.min.css', 'custom/AdminLTE.min.css', 'custom/_all-skins.min.css', 'custom/morris.css', 'custom/jquery-jvectormap.css', 'custom/bootstrap-datepicker.min.css', 'custom/daterangepicker.css', 'custom/bootstrap3-wysihtml5.min.css', 'custom/dataTables.bootstrap.min.css')) ?>
    
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    
     <?= $this->Html->script(array('jquery.min.js', 'jquery-ui.min.js', 'bootstrap.min.js', 'raphael.min.js', 'morris.min.js', 'jquery.sparkline.min.js', 'jquery-jvectormap-1.2.2.min.js', 'jquery-jvectormap-world-mill-en.js', 'jquery.knob.min.js', 'moment.min.js', 'daterangepicker.js', 'bootstrap-datepicker.min.js', 'jquery.slimscroll.min.js', 'fastclick.js', 'adminlte.min.js', 'demo.js', 'jquery.dataTables.min', 'dataTables.bootstrap.min.js')) ?>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
    
</head>
<body class="hold-transition skin-blue sidebar-mini">

	<style>
	label.error{
		color: red;
		font-weight: 400;
		font-style: italic;
	}
	
	.message.success{
		color: #fff;
		background-color: green;
		padding: 13px;
		margin-bottom: 15px;
	}
	
	.message.error{
		color: #fff;
		background-color: #c03131;
		padding: 13px;
		margin-bottom: 15px;
	}
	</style>

    <div class="wrapper">
    <?= $this->element('Admin/header') ?>
    <?= $this->element('Admin/sidebar') ?>
    
        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $this->fetch('content') ?>
    </div>
    
    <?= $this->element('Admin/footer') ?>
    
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    
   
    
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
	<script>
	$(document).ready(function(){
		$('#example2').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : false,
			'info'        : true,
			'autoWidth'   : false,
			'order'		  : [[ 1, "desc" ]]
		});
	});
	
	</script> 
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.6/tinymce.min.js"></script>
<script>
tinymce.init({
selector: 'textarea',
plugins: [
"code", "charmap", "link"
],
toolbar: [
"undo redo | styleselect | bold italic | link | alignleft aligncenter alignright | charmap code" | "media"
]
});
</script>
</body>
</html>
