

<p>
������� ������� ��� ����:

echo "# yii2-shop" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/Juriyzol/yii2-shop.git
git push -u origin master
</p>

<p>
����� ����� ��������� ����������, ������� ������ ��������� �������� ������
����������� �� ������, - �����_������_�������\web.

�� ��� ������ ������� �� ������� ������.

������������ ��� ��������� �������:
���� � ����� �����\config � ��������� ���� web.php
� ����� � 12 ������ � �������� �������� ����� ����������.
��� �� ��� ����������� ��� ������� ��������� ������:


        <?
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qwerty', // ����� � ��� ��������
            'baseUrl' => '', // ��������� ������ ��� ���
        ],
        ?>

����� � ���� �� ����� ��� �������� ��� ��������������� ���������� ������:        
        
        <?
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
        ?>             
</p>

<p>
��������� ��� ��� ����� ������� ��� ������� ���������� ������� � 
���������� ���:


��������� .htaccess � �������� �����:

Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on

RewriteCond %{REQUEST_URI} !^/(web)
RewriteRule ^assets/(.*)$ /web/assets/$1 [L]
RewriteRule ^css/(.*)$ web/css/$1 [L]
RewriteRule ^js/(.*)$ web/js/$1 [L]
RewriteRule ^images/(.*)$ web/images/$1 [L]
RewriteRule (.*) /web/$1

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /web/index.php


��������� .htaccess � �������� �����:

RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule . index.php
</p>
<p>
��� �������� �� ���� ������� ������ ��� ������ ������
����� ��������� � ����������� � ��� ������ �� ������� �� ��������� ���,
� ��� �� � ��� ��� ��� ��� ����� � ������ ������ ���������� �������� �� ��������.

�� � ��� �� ����� ��� ��������� ����� ������ ����� ������� �������������.
</p>



<h2>���� �2<h2>

<p>
�������� ����� ������ ������� �, - �����\web\css
��� �� ������� ��� ���� ����������� ��� �����,
����� ��� js, images, fonts � ������ ���� �� ��������� �������
����� ������ ����������� �� �� ������ � �����\web
</p>
<p>
��������� index.html ����� ������� � ��������� � ���� � �����
�����\views\layouts - ��� � ��� ��������� ����������� ���� main.php
����������� ��� ���-�� �� �������, �������� � _main.php � ��������
������ ���� main.php, � ������� ��������� ��� ���������� ��
���������� ������� ����� �������
</p>
<p>
������ ���� � ����� �����\assets � ��������� ���� AppAsset.php,
������� � ��������� �������� ��...? - �������� � �������� � �������

�������� � ��������� �������� $css ������ AppAsset ��� css ����� ��
������ �������:

<?
    public $css = [
        'css/site.css',       
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',             
    ];
?>

*���� �� ��������� � notepad++, �� ��� ����� ����� ����������� ��������� ����������
��� �������� ������:
������-��������������

� Notepad++ ���� �������� ����� � ������-��������������, ��� ����������, ���� ��� �������. � ������� ��������� ������ Ctrl � ����� ����� ������� ����� ����� �������� �� ������ ���������������� �������, �� � �����������. �.�. �������� ��������� ����� � �������� � ������������ �������� �� ���. �� ���������, ���, � ���������, ���������. �������� ����� ����� > ��������� > ������ > ������� ������-��������������.
� ��� ��� �������, - http://blog.verha.net/hotkeys-notepad.html

��� ����������� ������ �� ������� ��������� ������

������ ���� ����� �� ���������, �� ���� �������� �� � ����� ������� main.php
� ��������� �� � �������� $js ������ AppAsset

<?
    public $js = [   
    'js/jquery.js',
	'js/bootstrap.min.js',
	'js/jquery.scrollUp.min.js',
	'js/price-range.js',
    'js/jquery.prettyPhoto.js',
    'js/main.js',       
    ];
?>
</p>
<p>
??? ����� ����������� � depends ???

<?
    public $depends = [ // �����������
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', // ������
    ];   
?>

��������� � ������������ � ��� ��������� ������ BootstrapAsset
�� ������������� ��������� ������ � ��� �� �������� �������� �������,
�������� ��� ��������� ������� ������ AppAsset ������ ����� ��������� ���:

<?
    public $css = [
//        'css/site.css',       
//        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/animate.css',
        'css/main.css',
        'css/responsive.css',             
    ];
    public $js = [   
//    'js/jquery.js',
//    'js/bootstrap.min.js',
	'js/jquery.scrollUp.min.js',
	'js/price-range.js',
    'js/jquery.prettyPhoto.js',
    'js/main.js',       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
?>

* �� ������������ ������ ����������� �� ������� ����, ��� 
� ����� ������������ ������ BootstrapPluginAsset ��� ����������
����� �������� � ���������..
���� �������� ������������ ������ ���� ����� �� ����� ����� 
������� ��� ��������������� �������, - 'yii\bootstrap\BootstrapPluginAsset'

� ����� ������ ������� � �������� �������� ���-�� ������ ������� ����������� ����� 
</p>
<h3>���������� ������, ����������� �����</h3>
<p>
��� ���� ���-�� ��� ������ ��������� ��� ����� ������� ��� ������ � ���, ��������
������������� ������������ ���� � �.�.
������� �� �� ������� ��� ��������� ���� main.php - ������� ��� ���� ��� ���
��� ���� ���-�� ������ ����� � ��� ��� ����������� ��� ������� ������ ������ �������.

��������� ���� _main.php � �������� �� ���� ��������� (��� �� <!DOCTYPE html>) 
� ��� ����� ������:


<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this); // ������������ ��� �������� ������/��������
?>
<?php $this->beginPage() ?> // ����� ������ ��������

<!DOCTYPE html> <!-- ��� ������� �� ����� --> 

</p>
<p>
����������� ����:

<!DOCTYPE html>
<html lang="en"> // ��� ������ ������� ��� �������
<html lang="<?= Yii::$app->language ?>"> // �� ���

� ��� ���� � ��� �������� ��� ���� ������������ - web.php, 
������� ��������� �� ������ - �����\config � ��������� � ���
��������� ������, ����� ����� �������� ����������� � �������
�� ��� ��������:

<?
    'language' => 'ru_RU', // ��������� ��� �������
    'components' =>...
?>

���������� ������� �������:

������ ���:

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

�� ��� (��� �� ����� �� ���������� ���������������� �������):

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?> 
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

* ���� ����������� ������� - <?= Html::csrfMetaTags() ?> - ��������� ���
��� ����� �������� ������ � ������ �����...

�������� ��������� ���� �������� �� �� �����:

<body>
<?php $this->beginBody() ?>
...
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>    
</p>

<p>
��������� ����������������� �������� � ����� ��� ������ �� ������������.
������� � �������� � ����� ��������� � ������

���� � ��� �������� ������� � ��������� ��� ��������� ������:

Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on

RewriteCond %{REQUEST_URI} !^/(web)
RewriteRule ^assets/(.*)$ /web/assets/$1 [L]
RewriteRule ^css/(.*)$ web/css/$1 [L]
RewriteRule ^fonts/(.*)$ web/fonts/$1 [L] // ��������� ��� ��� ��� �������
RewriteRule ^js/(.*)$ web/js/$1 [L]
RewriteRule ^images/(.*)$ web/images/$1 [L]
RewriteRule (.*) /web/$1

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /web/index.php
</p>

???

???


<p>
!!!
������ ��� ��� ������ ������ � ��������� (�������� � ������������� ������������� �� ��������):

1) ������ (������ ��������� ��������������)
�� �������� ������ ������� �� ������, ���� ������� ������ �� ������ � � ��� � ����
������� �������

2) ������ (����������)
�� �������� ������ ������� ��� � �� ����� ���� ������� �� ���������. � ����� ��� ���
��������� ���������� �� ���� � ���� ������� � ����������� �������.
!!!
</p>

<p>

����������� ��������� ������ � ������������� ���������:

    <?php
        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>  

??? 
������� ������ ��� � ����������� ������������, ��� � ����������� ������ ���� � ��� ��,
�� ������ ��������� �������� ��� ���� � ������ ��������� �������� ������ ����������
� ����� ������ ��� ����� �������� ��������� � ����� ������, � ������ ������ ���
������ ������� ��� ����������� �����...
???    
    
</p>

<p>
� ����������� �����:

���� � ���� ������ �� ������, - �����\yii-shop\views\site
��������� ���� index.php � ������� � ��� ���� ������� �����:

<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

����� ��� ���� main.php � �������� � ��� ��� ���������� �����, ������� ���������
����� ������:
	</header><!--/header-->

    <?= $content; ?>
        
	<footer id="footer"><!--Footer-->

���������� ����� ��������� � ���� index.php � �� ����� ���������� ����������
������ ���������� $content
    
</p>
















