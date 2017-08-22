<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 凡星
// +----------------------------------------------------------------------
namespace Admin\Controller;

/**
 * 日志控制器
 *
 * @author 凡星
 */
class LogController extends AdminController {
	public function manage() {
		$map ['mod'] = array (
				'exp',
				'!="Admin"' 
		);
		session ( 'common_condition', $map );
		parent::common_lists ( 'admin_log', 0, 'Think:lists' );
		// $this->display ();
	}
	public function admin() {
		$map ['mod'] = 'Admin';
		session ( 'common_condition', $map );
		parent::common_lists ( 'admin_log', 0, 'Think:lists' );
	}
	public function api() {
		if (IS_POST) {
			$val = I ( 'val', 0, 'intval' );
			
			D ( 'Config' )->setValue ( 'REQUEST_LOG', $val );
		} else {
			$this->assign ( 'request_log', C ( 'REQUEST_LOG' ) );
			parent::common_lists ( 'request_log' );
		}
	}
	public function debug() {
		if (IS_POST) {
			$val = I ( 'val', 0, 'intval' );
			
			D ( 'Config' )->setValue ( 'DEBUG_LOG', $val );
		} else {
			$this->assign ( 'debug_log', C ( 'DEBUG_LOG' ) );
			parent::common_lists ( 'debug_log' );
		}
	}
	public function error() {
		if (IS_POST) {
			$val = I ( 'val', 0, 'intval' );
			
			D ( 'Config' )->setValue ( 'ERROR_LOG', $val );
		} else {
			$this->assign ( 'error_log', C ( 'ERROR_LOG' ) );
			
			$mysql = $this->getMysqlVersion ();
			$this->assign ( 'mysql', $mysql );
			$this->display ();
		}
	}
	function getMysqlVersion() {
		$mysql = '';
		if (function_exists ( 'mysql_get_server_info' )) {
			$mysql = mysql_get_server_info ();
		}
		if (empty ( $mysql )) {
			$res = M ()->query ( 'select VERSION() as v' );
			$mysql = $res [0] ['v'];
		}
		
		return $mysql;
	}
	function uploadErrorLog() {
		// 本地环境日志不上传
		$arr = parse_url ( SITE_URL );
		if ($arr ['host'] == '127.0.0.1' || $arr ['host'] == 'localhost') {
			return false;
		}
		
		// 每天只上传一次,且只上传昨天的
		$lock_key = 'uploadErrorLogLock_' . date ( 'Ymd', strtotime ( "-1 day" ) );
		$lock = S ( $lock_key );
		if ($lock !== false) {
			return false;
		}
		S ( $lock_key, 1, 86400 );
		
		// 获取EMERG,ALERT,CRIT,ERR级别的错误日志
		$urls = [ ];
		$levelArr = [ 
				'EMERG',
				'ALERT',
				'CRIT',
				'ERR',
				'INFO' 
		];
		$path = RUNTIME_PATH . 'Logs';
		$dirs = scandir ( $path );
		$date = date ( 'y_m_d' );
		foreach ( $dirs as $d ) {
			if ($d == '.' || $d == '..') {
				continue;
			}
			$newPath = $path . '/' . $d;
			foreach ( $levelArr as $level ) {
				$file = $newPath . '/' . $date . '_' . $level . '.log';
				if (file_exists ( $file )) {
					$urls [] = SITE_URL . ltrim ( $file, '.' );
				}
				// dump ( $file );
			}
		}
		
		// dump ( $urls );
		// 没有日志，不需要提交
		if (empty ( $urls )) {
			return false;
		}
		
		$param ['urls'] = implode ( PHP_EOL, $urls );
		$param ['os'] = PHP_OS;
		$param ['php'] = PHP_VERSION;
		$param ['mysql'] = $this->getMysqlVersion ();
		$param ['web'] = $_SERVER ['SERVER_SOFTWARE'];
		$param ['sapi'] = PHP_SAPI;
		$param ['port'] = $_SERVER ['SERVER_PORT'];
		$param ['key'] = md5 ( SITE_URL );
		
		$url = 'http://www.weiphp.cn/index.php?s=/w0/Home/Index/remoteErrorLog';
		post_data ( $url, $param );
	}
}