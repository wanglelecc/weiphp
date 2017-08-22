<?php

namespace Addons\NoAnswer\Controller;
use Think\ManageBaseController;

class NoAnswerController extends ManageBaseController{
    public function config() {
        $strtip = '常用配置地址：<br/>
&lt;a href=&quot;[follow]&quot;&gt;绑定帐号&lt;/a&gt;<br/>
&lt;a href=&quot;[website]&quot;&gt;微首页&lt;/a&gt;<br/>
&lt;a href=&quot;http://xxxx?token=[token]&quot;&gt;Token&lt;/a&gt;<br/>
&lt;a href=&quot;http://xxxx?opneid=[openid]&quot;&gt;OpenId&lt;/a&gt;';
    
        $this->assign ( 'normal_tips', $strtip );
        $this->getModel ();
        $map ['name'] = MODULE_NAME;
        $addon = M ( 'addons' )->where ( $map )->find ();
        if (! $addon)
            $this->error( '400300:插件未安装' );
        $addon_class = get_addon_class ( $addon ['name'] );
        if (! class_exists ( $addon_class ))
            trace ( "插件{$addon['name']}无法实例化,", 'ADDONS', 'ERR' );
        $data = new $addon_class ();
        $addon ['addon_path'] = $data->addon_path;
        $addon ['custom_config'] = $data->custom_config;
        $this->meta_title = '设置插件-' . $data->info ['title'];
        $db_config = D ( 'Common/AddonConfig' )->get ( MODULE_NAME );
        $addon ['config'] = include $data->config_file;
        if (IS_POST) {
            foreach ($addon['config'] as $k=>$vv){
                if ($vv['type'] == 'material'){
                    $_POST['config'][$k]=$_POST[$k];
                }
            }
            $flag = D ( 'Common/AddonConfig' )->set ( MODULE_NAME, I ( 'config' ) );
            	
            if ($flag !== false) {
                $this->success ( '保存成功', Cookie ( '__forward__' ) );
            } else {
                $this->error( '400301:保存失败' );
            }
        }
        if ($db_config) {
            foreach ( $addon ['config'] as $key => $value ) {
                if ($value ['type'] != 'group') {
                    ! isset ( $db_config [$key] ) || $addon ['config'] [$key] ['value'] = $db_config [$key];
                } else {
                    foreach ( $value ['options'] as $gourp => $options ) {
                        foreach ( $options ['options'] as $gkey => $value ) {
                            ! isset ( $db_config [$key] ) || $addon ['config'] [$key] ['options'] [$gourp] ['options'] [$gkey] ['value'] = $db_config [$gkey];
                        }
                    }
                }
            }
        }
        $this->assign ( 'data', $addon );
        // 		if ($addon ['custom_config'])
            // 			$this->assign ( 'custom_config', $this->fetch ( $addon ['addon_path'] . $addon ['custom_config'] ) );
        $this->display (T('Home@Addons/config'));
    }
}
