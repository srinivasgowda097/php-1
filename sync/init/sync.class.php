<?php

/**
 * 同步核心抽象类
 * @author panke
 * @version 0.1
 * @copyright (c) 2014-11-14 linktech
 */
abstract class Sync {

    protected $url;
    protected $pdo;
    protected $data;

    /**
     * 构造函数
     */
    public function __construct() {
        try {
            $this->pdo = new PDO(DSN, DB_USER, DB_PASSWD);
        } catch (PDOException $e) {
            echo '数据库连接错误,错误代码：'.$e->getMessage();    //如果有日志系统后，可以将该信息写入日志
        }
        $this->data = $this->getData($this->url);
    }

    /**
     * 获取数据的方法
     * 根据提供的接口访问数据并返回
     * 
     */
    protected function getData($url) {
        if (trim($url)) {
            $ch = curl_init();
            //设置选项，包括URL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);    //释放curl句柄
            return $data;
        }
        return '请设置$url属性值';
    }

    /**
     * 数据插入抽象方法
     */
    abstract protected function insertData();

    /**
     * 数据删除抽象方法
     */
    abstract protected function deleteData();

    /**
     * 数据更新抽象方法
     */
    abstract protected function updateData();

    /**
     * 数据查询抽象方法
     */
    abstract protected function selectData();
    
    /**
     * 析构函数
     */
    public function __destruct() {
        $this->pdo = null;
        $this->data = null;
    }
}
