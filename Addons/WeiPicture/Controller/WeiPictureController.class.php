<?php

namespace Addons\WeiPicture\Controller;
use Think\ManageBaseController;

class WeiPictureController extends ManageBaseController{
    function lists() {
        // $config=get_addon_config('Wecome');
        // dump($config);
       /*  $this->assign ( 'normal_tips', '温馨提示：图片大小不超过2M,    格式: bmp, png, jpeg, jpg, gif' ); */
        //$map ['is_use'] = 1;
        // $map ['manager_id'] = $this->mid;
        $map ['token'] = get_token ();
        $list = M ( 'picture' )->where ( $map )->field('id')->order ( 'id desc' )->selectPage ( 39 );
        foreach ($list['list_data'] as &$v){
            $v['cover_url'] =get_picture_url($v['id']);
        }
        $this->assign ( $list );
        $this->display ();
    }
    function add_picture() {
        $save ['cover_id'] = I ( 'cover_id' );
        $save ['cover_url'] = I ( 'src' );
        if (empty ( $save ['cover_id'] ) || empty ( $save ['cover_url'] )) {
            $this->error ( '110114:图片参数出错' );
        }
        $save ['media_id'] = $this->_image_media_id ( $save ['cover_id'] );
        $save ['cTime'] = NOW_TIME;
        $save ['manager_id'] = $this->mid;
        $save ['token'] = get_token ();
        M ( 'material_image' )->add ( $save );
        $this->success ( '增加成功' );
    }
    function del_picture() {
        $map ['id'] = I ( 'id' );
        echo M ( 'picture' )->where ( $map )->delete ();
    }
    function _image_media_id($cover_id) {
        $cover = get_cover ( $cover_id );
        $driver = C ( 'PICTURE_UPLOAD_DRIVER' );
        if ($driver != 'Local' && ! file_exists ( SITE_PATH . $cover ['path'] )) { // 先把图片下载到本地
            	
            $pathinfo = pathinfo ( SITE_PATH . $cover ['path'] );
            mkdirs ( $pathinfo ['dirname'] );
            	
            $content = wp_file_get_contents ( $cover ['url'] );
            $res = file_put_contents ( SITE_PATH . $cover ['path'], $content );
            if (! $res) {
                addWeixinLog ( '远程图片下载失败', '_image_media_id' );
                return '';
            }
        }
    
        $path = $cover ['path'];
    
        $param ['type'] = 'image';
        $param ['media'] = '@' . realpath ( SITE_PATH . $path );
        $url = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=' . get_access_token ();
        $res = post_data ( $url, $param, true );
        if (isset ( $res ['errcode'] ) && $res ['errcode'] != 0) {
            addWeixinLog ( error_msg ( $res, '图片素材上传' ), '_image_media_id' );
            return '';
        }
        return $res ['media_id'];
    }
}
