<link href="<?php echo base_url() . APPPATH ?>views/static/dropzone/dist/dropzone.css" rel="stylesheet" />
<!-- begin #content -->
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Tables</a></li>
        <li><a href="javascript:;">Managed Tables</a></li>
        <li class="active">Autofill</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Managed Tables - Autofill <small>header small text goes here...</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div class="row">
        <!-- begin col-10 -->
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
                    <h4 class="panel-title">DataTable - Autofill</h4>
                </div>
                <div class="panel-body">
                    <div id="dropzone" class="col-md-6 dropzone">
                    </div>
                    <input type="hidden" id="icon" name="icon" value="" />
                    <div id="dropzone1" class="col-md-6 dropzone">
<!--                        <div class="dz-preview dz-processing dz-image-preview dz-error dz-complete">
                        <div class="dz-image">
                            <img data-dz-thumbnail src="https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=2524117942,1825822756&fm=58" />
                        </div>
                        </div>-->
<!--                        <div class="dz-preview dz-file-preview" data-id="" data-pic="https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=2524117942,1825822756&fm=58">  
                            <div class="dz-details">
                                <div class="dz-filename"><span data-dz-name></span></div>
                                <div class="dz-size" data-dz-size>
                                    <strong>10</strong>KB
                                </div>
                                <img data-dz-thumbnail src="https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=2524117942,1825822756&fm=58" /> 
                            </div>
                            <div class="dz-progress">
                                <span class="dz-upload" data-dz-uploadprogress></span>
                            </div>  
                            <div class="dz-success-mark"><span>✔</span></div>
                            <div class="dz-error-mark"><span>✘</span></div>
                            <div class="dz-error-message">
                                <span data-dz-errormessage></span>
                            </div>
                            <a class="dz-remove" href="javascript:undefined;">移除文件</a>
                        </div>-->
                    </div>
                    <input type="button" id="submit" value="提交">
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>
    <!-- end row -->
<!-- end #content -->
<script src="<?php echo base_url() . APPPATH ?>views/static/dropzone/dist/dropzone.js"></script>
<script>
    $("#dropzone").dropzone({
        url: '<?php echo site_url('backend/image/uploadIcon');?>',
        parallelUploads: 1,
        paramName: "file",
        maxFilesize: 2,
        maxFiles: 1,

        autoProcessQueue: false,
        addRemoveLinks : true,
        dictRemoveFile: '移除文件',
        dictDefaultMessage: '点击或拖拽文件上传',
        dictMaxFilesExceeded: '只能上传{{maxFiles}}张图片',
//        previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\" style=\"display: none;\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" style=\"display: none;\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",
        init: function() {
            this.on("success", function(file, res){
                res = JSON.parse(res);
                if (res.status != 0) {
                    alert(res.desc);
                } else {
                    $('#icon').val(res.name);
                }
                console.log(res);
            });
            this.on("removedfile", function(file){
                $('#icon').val('');
            });
            var _this = this;
            var uploadedFiles = [{"name": "\u667a\u80fd\u786c\u4ef6.jpg", "path": "http:\/\/backend.hc.com\/uploads\/20120708173719-1087458132.jpg", "type": "image\/jpeg", "id": 1, "index": 1}];
            if (uploadedFiles.length) {
                uploadedFiles = uploadedFiles.slice(0, 1);
                var _files = [];
                var _i = uploadedFiles.length;
                $.each(uploadedFiles, function (key, value) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', value.path, true);
                    xhr.setRequestHeader('Accept', 'image/png,image/*;q=0.8,*/*;q=0.5');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.responseType = 'arraybuffer';
                    xhr.onload = function (e) {
                        if (this.status === 200 || this.status === 304) {
                            var file = new Blob([this.response], {type: value.type});
                            file.name = value.name;
                            _files[key] = file;
                            _i--;
                            if (_i == 0) {
                                $.each(uploadedFiles, function (key, value) {
                                    _this.addFile.call(_this, _files[key], {id: value.id, index: value.index, path: value.path});
                                });
                            }
                        }
                    };
                    xhr.send(null);
                });
            }
            $('#submit').on('click', function(){
               _this.processQueue();
            });
        },
    });

  $("#dropzone1").dropzone({
        url: '<?php echo site_url('backend/image/uploadIcon');?>',
        parallelUploads: 1,
        paramName: "file",
        maxFilesize: 2,
        maxFiles: 1,

        autoProcessQueue: false,
        addRemoveLinks : true,
        dictRemoveFile: '移除文件',
        dictDefaultMessage: '点击或拖拽文件上传',
        dictMaxFilesExceeded: '只能上传{{maxFiles}}张图片',
//        previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\" style=\"display: none;\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" style=\"display: none;\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>",
        init: function() {
            this.on("success", function(file, res){
                res = JSON.parse(res);
                if (res.status != 0) {
                    alert(res.desc);
                } else {
                    $('#icon').val(res.name);
                }
                console.log(res);
            });
            this.on("removedfile", function(file){
                $('#icon').val('');
            });
            var _this = this;
            var uploadedFiles = [{"name": "20120708173719-1087458132.jpg", "path": "http:\/\/backend.hc.com\/uploads\/20120708173719-1087458132.jpg", "type": "image\/jpeg", "id": 1, "index": 1}];
            if (uploadedFiles.length) {
                uploadedFiles = uploadedFiles.slice(0, 1);
                var _files = [];
                var _i = uploadedFiles.length;
                $.each(uploadedFiles, function (key, value) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', value.path, true);
                    xhr.setRequestHeader('Accept', 'image/png,image/*;q=0.8,*/*;q=0.5');
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.responseType = 'arraybuffer';
                    xhr.onload = function (e) {
                        if (this.status === 200 || this.status === 304) {
                            var file = new Blob([this.response], {type: value.type});
                            file.name = value.name;
                            _files[key] = file;
                            _i--;
                            if (_i == 0) {
                                $.each(uploadedFiles, function (key, value) {
                                    _this.addFile.call(_this, _files[key], {id: value.id, index: value.index, path: value.path});
                                });
                            }
                        }
                    };
                    xhr.send(null);
                });
            }
            $('#submit').on('click', function(){
               _this.processQueue();
            });
        },
    });
</script>
