<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends MY_Controller {

    public function uploadIcon() {
        
        $maxFileSize = 2 * 1024 * 1024;
        $allowFileType = array('image/jpg','image/jpeg','image/pjpeg','image/png');
        
        if (!in_array($_FILES["file"]["type"], $allowFileType)) {
            $res = array(
                'status' => 1,
                'desc' => '不支持的图片类型',
                'name' => '',
            );
            exit(json_encode($res));
        }
        
        if ($_FILES["file"]["size"] > $maxFileSize) {
            $res = array(
                'status' => 2,
                'desc' => '图片大小超出范围',
                'name' => '',
            );
            exit(json_encode($res));
        }
        
        $path = "./uploads/category/";
        $pinfo = pathinfo($_FILES["file"]["name"]);  
        $ftype = $pinfo['extension'];
        $prefix = 'cate_' . mt_rand(1000, 9999);
        $fileName = uniqid($prefix) . "." . $ftype; 
        $destination = $path . $fileName;
        if (file_exists($destination)) {
            $res = array(
                'status' => 3,
                'desc' => '该文件已经存在，请更换文件名',
                'name' => $_FILES["file"]["name"],
            );
            exit(json_encode($res));
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
            $res = array(
                'status' => 0,
                'desc' => '上传成功',
                'name' => $fileName,
            );
            exit(json_encode($res));
        }
        
    }
    
}
