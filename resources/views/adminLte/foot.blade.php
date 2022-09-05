<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>



<!--For Drop Zone  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>

<script>

    //Edit Album
    $('#edit').on('show.bs.modal', function (event) {
        console.log(event);
        var button = $(event.relatedTarget);
        var album_id = button.data('id');
        var name = button.data('name');
        var modal = $(this);

        modal.find('.modal-body #album-id').val(album_id);
        modal.find('.modal-body #name').val(name);
    });

    //End of Edit Album


    //Delete all Album
    $('#delete-all').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var album_id = button.data('id');
        var modal = $(this);

        modal.find('.modal-body #album-id').val(album_id);
    });
    //Delete all Album


    //Delete Album
    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var album_id = button.data('id');
        var modal = $(this);

        modal.find('.modal-body #album-id').val(album_id);
        modal.find('.modal-footer #album-idd').val(album_id);

    });
    //End of Delete Album

    $('#move_album').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var old = button.data('id');
        var modal = $(this);

        console.log(old);
        modal.find('.modal-body #old_album_id').val(old)
    });


    // Dropzone

    Dropzone.options.dropzoneForm = {
        autoProcessQueue : false,
        acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
        addRemoveLinks :true,
        maxThumbnailFilesize: 100,
        parallelUploads: 100,
        parallelChunkUploads : false,
        init:function(){
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this;

            submitButton.addEventListener('click', function(){
                myDropzone.processQueue();
            });

            this.on("complete", function(){
                if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
                {
                    var _this = this;
                    _this.removeAllFiles();
                }
            });
        }
    };
    $('#submit-all').click(function() {
        setTimeout(function(){
            window.location.reload();
        }, 2000);
    });


    // End Of DropZone

</script>

