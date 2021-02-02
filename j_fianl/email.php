<?php
function sendMail($to,$content,$name,$title){
    //引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告
    require_once("./PHPMailer/class.phpmailer.php"); 
    require_once("./PHPMailer/class.smtp.php");
    //实例化PHPMailer核心类
    $mail = new PHPMailer();
    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->SMTPAuth=true;
    //链接qq域名邮箱的服务器地址
    $mail->Host = 'smtp.qq.com';
    //设置使用ssl加密方式登录鉴权
    $mail->SMTPSecure = 'ssl';
    //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
    $mail->Port = 465;
    //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
    $mail->Hostname = '';
    //设置发送的邮件的编码
    $mail->CharSet = 'UTF-8';
    //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    $mail->FromName = $name;
    //smtp登录的账号 这里填入字符串格式的qq号即可
    $mail->Username ='974249471@qq.com';
    //smtp登录的密码 使用生成的授权码
    $mail->Password = 'iqfehqspcqrkbbei';
    //设置发件人邮箱地址 smtp.qq.com
    $mail->From = '974249471@qq.com';
    //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    $mail->isHTML(true); 
    $mail->addAddress($to,$title);
    $mail->Subject = $title;
    $mail->Body = $content;
    $status = $mail->send();
    //判断与提示信息
    if($status) {
        return true;
    }else{
        return false;
    }
}
//获得前端提交的内容
$email= "kcg@upto-c.com";
$name=$_POST['name'];
$text=$_POST['content'];
$title=$_POST['subject'];
$flag = sendMail($email,$text,$name,$title);
if($flag){
    // echo "发送邮件成功！";
    header('location:index.html');
}else{
    echo "发送邮件失败！";
}
?>