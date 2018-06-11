<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->meta(['charset' => 'utf-8']) ?>
        <?= $this->Html->meta(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1.0']) ?>
        <title>Amin | Basic Form</title>

        <?= $this->Html->css(['/css/bootstrap.min', '/font-awesome/css/font-awesome', '/css/plugins/iCheck/custom', '/css/animate', '/css/style', '/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox']) ?>
        <?= $this->Html->css('/css/plugins/jasny/jasny-bootstrap.min.css') ?>
        <?= $this->Html->css('/css/plugins/switchery/switchery.css') ?>
        <?= $this->Html->css('/css/plugins/chosen/bootstrap-chosen.css') ?>
        <?= $this->Html->css('/css/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>
        <?= $this->Html->css('/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>
        <?= $this->Html->css('/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css'); ?>
        <?= $this->Html->css('/css/plugins/datapicker/datepicker3.css'); ?>
        <!--< $this->Html->css('/css/plugins/datetimepicker/bootstrap-datetimepicker.css'); ?>-->
        <?= $this->Html->css('/css/plugins/summernote/summernote.css'); ?>
        <?= $this->Html->css('/css/plugins/summernote/summernote-bs3.css'); ?>
    </head>

    <body>

        <div id="wrapper">

            <?= $this->element('left_menu') ?>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Welcome to Admin Panel.</span>
                            </li>
                            <li>
                                <a href="login.html">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>
                <?= $this->element('breadcrumb') ?>
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <?= $this->element('button_top') ?>

                                </div>
                                <div class="ibox-content">
                                    <?= $this->fetch('content') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2017
                    </div>
                </div>

            </div>
        </div>


        <!-- Mainly scripts -->

        <?= $this->Html->script('/js/jquery-3.1.1.min.js') ?>
        <?= $this->Html->script('/js/bootstrap.min.js') ?>
        <?= $this->Html->script('/js/plugins/metisMenu/jquery.metisMenu.js') ?>
        <?= $this->Html->script('/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>
        <?= $this->Html->script('/js/inspinia.js') ?>
        <?= $this->Html->script('/js/plugins/pace/pace.min.js') ?>
        <?= $this->Html->script('/js/plugins/iCheck/icheck.min.js') ?>
        <?= $this->Html->script('/js/plugins/jasny/jasny-bootstrap.min.js') ?>
        <?= $this->Html->script('/js/plugins/switchery/switchery.js') ?>
        <?= $this->Html->script('/js/plugins/chosen/chosen.jquery.js') ?>
        <?= $this->Html->script('/js/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>
        <?= $this->Html->script('/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js'); ?>
        <!--< $this->Html->script('/js/plugins/datapicker/bootstrap-datepicker.js'); ?>-->
        <?= $this->Html->script('/js/plugins/summernote/summernote.min.js'); ?>
        <!--< $this->Html->script('/js/plugins/datetimepicker/bootstrap-datetimepicker.js'); ?>-->
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });


                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

                elems.forEach(function (html) {
                    var switchery = new Switchery(html, {color: '#1AB394'});
                });


                $('.tagsinput').tagsinput({
                    tagClass: 'label label-primary'
                });
                $('.summernote').summernote({
                    height: 200,

                    // tell summernote what to do on image upload
                    onImageUpload: function (files) {

                        // init form data and `append` whatever we need to send along.
                        // see: https://developer.mozilla.org/en/docs/Web/API/FormData
                        var data = new FormData();
                        data.append("file", files[0]);

                        $.ajax({
                            data: data,
                            type: "POST",
                            url: '/admin-dashboard1/add', // url to process this ajax request
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (url) {
                                // the server should give the url of the file we uploaded
                                // so that we can tell summernote to insert that url to the editor.
                                $('.summernote').summernote('editor.insertImage', url);
                            }
                        });
                    }
                });



            });
            $('.chosen-select').chosen({width: "100%"});
            $('.my-colorpicker2').colorpicker();
            $('.timepicker').datetimepicker({
                format: 'dd/mm/yyyy hh:ii:ss',
                showSecond: true,
                timeFormat: 'hh:mm:ss'
            });
            $(".datepicker").datepicker({
                format: 'dd/mm/yyyy',
            });

        </script>
    </body>

</html>
