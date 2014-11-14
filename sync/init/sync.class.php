<?php

/**
 * ͬ�����ĳ�����
 * @author panke
 * @version 0.1
 * @copyright (c) 2014-11-14 linktech
 */
abstract class Sync {

    protected $url;
    protected $pdo;
    protected $data;

    /**
     * ���캯��
     */
    public function __construct() {
        try {
            $this->pdo = new PDO(DSN, DB_USER, DB_PASSWD);
        } catch (PDOException $e) {
            echo '���ݿ����Ӵ���,������룺'.$e->getMessage();    //�������־ϵͳ�󣬿��Խ�����Ϣд����־
        }
        $this->data = $this->getData($this->url);
    }

    /**
     * ��ȡ���ݵķ���
     * �����ṩ�Ľӿڷ������ݲ�����
     * 
     */
    protected function getData($url) {
        if (trim($url)) {
            $ch = curl_init();
            //����ѡ�����URL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $data = curl_exec($ch);
            curl_close($ch);    //�ͷ�curl���
            return $data;
        }
        return '������$url����ֵ';
    }

    /**
     * ���ݲ�����󷽷�
     */
    abstract protected function insertData();

    /**
     * ����ɾ�����󷽷�
     */
    abstract protected function deleteData();

    /**
     * ���ݸ��³��󷽷�
     */
    abstract protected function updateData();

    /**
     * ���ݲ�ѯ���󷽷�
     */
    abstract protected function selectData();
    
    /**
     * ��������
     */
    public function __destruct() {
        $this->pdo = null;
        $this->data = null;
    }
}
