<?php
/**
 * 同步系统配置文件
 * @author panke panke@linktech.cn
 * @version 0.1
 * @copyright (c) 2014-11-14, Linktech
 */
define('PATH','/home/linktech/batch/sync/');
/*
 * 数据库连接配置（PDO）
 */
define('DSN', 'mysql:host=localhost;dbname=');
define('DB_USER','');
define('DB_PASSWD','');

include PATH.'init/sync.class.php';
