<?php
error_reporting ( E_ERROR );
date_default_timezone_set ( 'PRC' );

define ( 'APP_DEBUG', true );

// 网站根路径设置
define ( 'SITE_PATH', dirname ( __FILE__ ) );

/**
 * 应用目录设置
 * 安全期间，建议安装调试完成后移动到非WEB目录
 */
define ( 'APP_PATH', './Application/' );

/**
 * 缓存目录设置
 * 此目录必须可写，建议移动到非WEB目录
 */
define ( 'RUNTIME_PATH', './Runtime/' );
define ( 'BIND_MODULE', 'Home' );
define ( 'BIND_CONTROLLER', 'Notice' );
define ( 'BIND_ACTION', 'index' );
/**
 * 引入核心入口
 * ThinkPHP亦可移动到WEB以外的目录
 */
require './ThinkPHP/ThinkPHP.php';