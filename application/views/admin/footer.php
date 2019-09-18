
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1.0
    </div>
    <img class="img-responsive" src="<?php echo base_url(); ?>admdist/dist/img/logo.png" style="margin-top: -10px;max-width: 60%;height: 30px;" /> 
 </footer>

</div>
<script src="http://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
<!-- ./wrapper -->
<!-- <script type="text/javascript" src="http://jhollingworth.github.io/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script> -->
<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>admdist/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>admdist/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>admdist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>admdist/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>admdist/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>admdist/dist/js/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>admdist/dist/js/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>admdist/dist/moment-develop/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>admdist/dist/js/bootstrap-datetimepicker.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>admdist/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>admdist/dist/js/toggler.js"></script>
<!-- <script src="<?php echo base_url(); ?>admdist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<script src="<?php echo base_url(); ?>admdist/plugins/node_modules/video.js/dist/video.min.js"></script>
<script src="<?php echo base_url(); ?>admdist/plugins/ckeditor/ckeditor.js"></script>
<script>
  
 
$(document).ready(function () {
  CKEDITOR.editorConfig = function (config) {
    config.language = ['es','ar'];
    config.uiColor = '#F7B42C';
    config.height = 300;
    config.toolbarCanCollapse = true;
    config.alignment=true;
    config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

};
CKEDITOR.replace('edit_brief_desc');
CKEDITOR.replace('brief_desc');
CKEDITOR.replace('slide_description');
CKEDITOR.replace('edit_slide_description');



    // $( '#edit_brief_desc' ).ckeditor();
    $('.sidebar-menu').tree();
    
				
  });
</script>
</body>
</html>
