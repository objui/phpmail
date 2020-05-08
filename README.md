### 说明
使用PHP开发，基于phpmailer整个的一个发送邮件工具

### 安装
```
composer require objui/phpmail
```

使用示例
```
require '../vendor/autoload.php';
use objui\phpmail\Email;       
$config = [
        'host'           => 'smtp.qq.com',                  //服务器smtp.qq.com  smtp.163.com
        'port'           => '465',                          //邮件服务端口                  
        'username'       => '',            //代理邮件    
        'password'       => '',             //授权码（注意不是密码）        
        'from_email'     => '',            //发送人邮箱  
        'from_name'      => 'objui',                       //发送人姓名                    
];
      
$email = new Email($config);   
        
$sendata = [
    'subject'  => '服务器报警通知', 
    'to_email'   => 'objui@qq.com', 
    'content'    => '服务器连接出错，请及时处理',
];

$email->send($sendata);
```
