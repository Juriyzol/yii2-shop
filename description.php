

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




