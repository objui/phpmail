<?php
/**
 * 发送邮件
 * @Author objui@qq.com
 * @time 2020/05/08
 */
namespace objui\phpmail;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    protected $config = [
        'host'           => 'smtp.qq.com',  //服务器smtp.qq.com  smtp.163.com
        'port'           => '465',          //邮件服务端口 
        'username'       => '',             //代理邮件  
        'password'       => '',             //授权码（注意不是密码）     
        'auth'           => true,           //启用smtp认证
        'secure'         => 'ssl',          //使用安全协议
        'from_email'     => '',             //发送人邮箱
        'from_name'      => '',             //发送人姓名
        'charSet'        => 'UTF-8'         //编码
    ];

    public function __construct(array $config = [])
    {
        $this->config = array_merge($this->config, array_change_key_case($config));
    }

    /** 
     * 发送邮件                
     * Author: objui@qq.com
     * @param string $to_email 接收人邮箱
     * @param string $subject  主题
     * @param string $content  内容
     * @param string $attachment 附件
     */
    public function send(array $data = [])
    {
        $config = [
            'subject'    => '',
            'to_email'   => '',
            'content'    => '',         
            'attachment' => ''        //附件
        ];
        $data = array_merge($config, $data);
        $mail = new PHPMailer; 
        $mail->IsSMTP();                                // 启用SMTP
        $mail->Host = $this->config['host'];            //smtp服务器的名称
        $mail->SMTPAuth = $this->config['auth'];        //启用smtp认证
        $mail->Username = $this->config['username'];    //你的邮箱名
        $mail->Password = $this->config['password'] ;   //邮箱密码
        $mail->From = $this->config['from_email'];      //发件人地址
        $mail->FromName = $this->config['from_name'];   //发件人姓名
        $mail->CharSet = $this->config['charSet'];      //设置邮件编码
        $mail->AddAddress($data['to_email']);           //接收邮箱
        $mail->Subject = $data['subject'];              //主题
        $mail->MsgHTML($data['content']);               //发送内容
        return($mail->Send());
    }
}
