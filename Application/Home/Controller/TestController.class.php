<?php

namespace Home\Controller;

class TestController extends HomeController {
	function lists() {
		$apath = SITE_PATH . '/Addons'; // /Admin/
		$alist = scandir ( $apath );
		
		$i = 400000;
		$search = 'REPLACE_CODE';
		foreach ( $alist as $addon ) {
			if ($addon == '.' || $addon == '..')
				continue;
				// dump ( $list );
				// exit ();
			
			$path = $apath . '/' . $addon . '/Controller';
			// dump($path);
			$list = scandir ( $path );
			// dump ( $list );
			// continue;
			foreach ( $list as $vo ) {
				if ($vo == 'TestController.class.php' || $vo == '.' || $vo == '..')
					continue;
				
				$file = $path . '/' . $vo;
				$content = file_get_contents ( $file );
				
				$arr = explode ( $search, $content );
				// dump ( $arr );
				$str = '';
				foreach ( $arr as $v ) {
					$str .= $v . $i;
					$i ++;
					// dump ( $i );
				}
				$num = $i - 1;
				$str = trim ( $str, $num );
				file_put_contents ( $file, $str );
			}
		}
		dump ( 'voer' );
	}
}
