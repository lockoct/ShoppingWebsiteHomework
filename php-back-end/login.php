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
    $password =  $_POST["password"];
    $password = md5($password);

    try {
        $sql = "select * from t_user where user_name = '{$username}' and user_password = '{$password}'";
        $stat = $pdo->query($sql);
        $row = $stat->rowCount();
        $returnJson;
        if ($row>0) {
            $returnJson = array('code' => 1);
            $returnJson = json_encode($returnJson);
            echo $returnJson;
        } else {
            $returnJson = array('code' => 0, 'msg' => '用户名不正确或密码错误');
            $returnJson = json_encode($returnJson);
            echo $returnJson;
        }
        
    } catch(Exception $e) {
        die($e->getMessage());
    }
?>