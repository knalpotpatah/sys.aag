<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.13
    </div>
    <strong>Copyright &copy; 2019 <a href="https://aag.co.id">PT Atrindo Asia Global</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->

        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

<!-- jQuery 3 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/') ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="<?= base_url('assets/') ?>pluginsjvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url('assets/') ?>pluginsjvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<!-- <script src="<?= base_url('assets/backend/lte/') ?>bower_components/moment/min/moment.min.js"></script> -->
<!-- <script src="<?= base_url('assets/backend/lte/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="<?= base_url('assets/') ?>pluginsbootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets/') ?>/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?= base_url('assets/') ?>summernote/summernote-bs4.js"></script>
<script src="<?= base_url('assets/') ?>summernote/summernote-bs42.js"></script>
<script src="<?= base_url('assets/') ?>ckeditor/ckeditor.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url('assets/backend/lte/') ?>dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->

<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<script>
    $(function() {
        $('#example1').DataTable()
        $('#example2').DataTable()
        $('#example3').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });
        $(".input-group.date").datepicker();

    });
</script>
<script>
    $(document).ready(function() {
        <?php foreach ($customer as $cust) : ?>
            $("#marking<?= $cust->id_customer ?>").hide();
            $("#status<?= $cust->id_customer ?>").change(function() {
                if ($(this).val() == 'approve') {
                    $("#marking<?= $cust->id_customer ?>").show();
                } else {
                    $("#marking<?= $cust->id_customer ?>").hide();
                }
            });
        <?php endforeach ?>
    });
</script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear', 'italic']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            disableDragAndDrop: false,
            height: "250px",
            width: "auto",
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });

        function uploadImage(image) {
            var data = new FormData();
            data.append("image", image);
            $.ajax({
                url: "<?php echo site_url('ngadmin/service/upload_image') ?>",
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                type: "POST",
                success: function(url) {
                    $('#summernote').summernote("insertImage", url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteImage(src) {
            $.ajax({
                data: {
                    src: src
                },
                type: "POST",
                url: "<?php echo site_url('ngadmin/page/delete_image') ?>",
                cache: false,
                success: function(response) {
                    console.log(response);
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function() {
        <?php foreach ($custitem as $csi) : ?>
            $("#tgl_eta<?= $csi->id_invoice ?>").hide();
            $("#status_item<?= $csi->id_invoice ?>").change(function() {
                var from = jQuery('input[name=eta_tgl]');
                if ($("#status_item<?= $csi->id_invoice ?>" + " option:selected").html() == 'ETA') {
                    $("#tgl_eta<?= $csi->id_invoice ?>").show();
                    from.attr('required', 'required');
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'status_eta',
                        value: 'ETA'
                    }).appendTo('form');
                } else {
                    from.removeAttr('required');
                    $("#tgl_eta<?= $csi->id_invoice ?>").hide();
                }
            });
        <?php endforeach ?>
    })
</script>
<script>
    $(document).ready(function() {
        <?php foreach ($custitem as $csi) : ?>
            $("#updates<?= $csi->id_invoice ?>").click(function() {
                var y = document.getElementById('tabeldata');
                var x = document.getElementById('update<?= $csi->id_invoice ?>');
                if (x.style.display === 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                } else {
                    x.style.display = 'none';
                }
            });
            $("#batalupdate<?= $csi->id_invoice ?>").click(function() {
                var y = document.getElementById('update<?= $csi->id_invoice ?>');
                var x = document.getElementById('tabeldata');
                if (x.style.display == 'none') {
                    x.style.display = 'block';
                    y.style.display = 'none';
                } else {
                    y.style.display = 'none';
                }
            });
        <?php endforeach ?>

    })
</script>
<script>
    $(document).ready(function() {
        $('.form-check-input').click(function() {
            const idmenu = $(this).data('menu');
            const idrole = $(this).data('role');
            $.ajax({
                url: "<?= base_url('ngadmin/admin/changeaccess'); ?>",
                type: "POST",
                data: {
                    menuId: idmenu,
                    roleId: idrole
                },
                success: function() {
                    document.location.href = "<?= base_url('ngadmin/admin/access/') ?>" + idrole;
                }
            });
        });
    })
</script>
<script>
    $(function() {
        $('#notam').on('keypress', function(e) {
            if (e.which == 32)
                return false;
        });
    });
</script>

</body>

</html>