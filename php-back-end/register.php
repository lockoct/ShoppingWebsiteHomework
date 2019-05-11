<?php
    $dsn = 'mysql:dbname=shopwebsite;host=localhost;port=3306';
    $un= 'root';
    $pw = '13336527238xhl';

    try {
        $pdo = new PDO($dsn, $un, $pw);
    } catch(Exception $e) {
        $returnJson = array('code' => 0, 'msg' => '数据库连接失败');
        $returnJson = json_encode($returnJson);
        echo $returnJson;
    }

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $username = $_POST["username"];
    $email =  $_POST["email"];
    $password =  $_POST["password"];

    try {
        $sql = "select * from t_user where user_name = '{$username}'";
        $stat = $pdo->query($sql);
        $row = $stat->rowCount();
        $returnJson;
        if ($row>0) {
            $returnJson = array('code' => 0, 'msg' => '用户名已被注册');
            $returnJson = json_encode($returnJson);
            echo $returnJson;
        } else {
            $stat = $pdo->prepare("insert into t_user (user_name,user_email,user_password) values (?,?,?)");
            $password = md5($password);
            $stat->bindValue(1,$username);
            $stat->bindValue(2,$email);
            $stat->bindValue(3,$password);
            $stat->execute();
            $returnJson = array('code' => 1, 'msg' => '注册成功');
            $returnJson = json_encode($returnJson);
            echo $returnJson;
        }
        
    } catch(Exception $e) {
        die($e->getMessage());
    }
?>