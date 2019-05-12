# 简介
本项目是我大二下学期PHP课程的期末作业  
内容为服装商城网页+注册登录功能  
在master分支静态页面的基础上加入了~~PHP后台~~（可能根本不算后台，只是简单的处理代码）  
并且实现了~~前后台分离~~（不知道算不算...）
# 展示
![show1](/description/show1.png "1")
![show2](/description/show2.png "2")
![show3](/description/show3.png "3")
# 技术栈
1. JQuery
2. Bootstrap3
3. PHP
4. MySQL
# 工程目录结构
db：创建数据库的sql文件  
php-back-end：PHP后台处理文件  
static：静态页面、图像文件  
description：markdown的需要的图片
# 部署方式
现在仅提供使用phpStudy的部署方式：  
1. 选择php7.2+nginx的方案  
![show4](/description/show4.png "4")
2. 将工程放到WWW文件夹下
3. nginx配置如下：
```nginx
location / {
    #路径根据你的phpStudy安装路径决定
    root   C：/phpStudy/PHPTutorial/WWW/static;
    index  index.html;
    autoindex off;
}

location ~ \.php$ {
    root           C：/phpStudy/PHPTutorial/WWW/php-back-end;
    fastcgi_pass   127.0.0.1：9000;
    fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
    include        fastcgi_params;
}
```
4. 在phpStudy数据库管理工具(我使用的是MySQL-Front)导入db文件夹中的sql文件
5. 修改php-back-end文件夹中两个php文件的这个部分
```php
$un = '';   //phpStudy的mysql用户名
$pw = '';   //密码
```
# 写在最后
1. 这次项目是第一次自己成功做到使用ajax发起请求并从php中接收返回的json数据
2. php的部分没有使用框架
3. 这项目挺菜的，但是还是记录一下
