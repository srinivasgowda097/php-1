<?php
/**
 * oracle数据库tmerchant表的部分字段到mysql表tmerchant_status的同步
 * @author panke
 * @version 0.1
 * @copyright (c) 2014-11-14, Linktech
 */

class TmerchantStatus extends Sync {
    protected $url = '';
    public function insertData() {
        ;
    }
    
    public function deleteData() {
        ;
    }
    
    public function updateData() {
        ;
    }
    
    public function selectData() {
        ;
    }
    public function showData() {
        echo $this->data;
    }
}

$n = new TmerchantStatus();
$n->showData();



