<?php
require '../vendor/autoload.php';
use objui\phpmail\Email;
$config = [
        'host'           => 'smtp.qq.com',                  //������smtp.qq.com  smtp.163.com
        'port'           => '465',                          //�ʼ�����˿� 
        'username'       => '',            //�����ʼ�  
        'password'       => '',             //��Ȩ�루ע�ⲻ�����룩        
        'from_email'     => '',            //����������
        'from_name'      => 'objui',                       //����������
];

$email = new Email($config);

$sendata = [
    'subject'  => '����������֪ͨ',
    'to_email'   => 'objui@qq.com',
    'content'    => '���������ӳ����뼰ʱ����',
];

$email->send($sendata);














