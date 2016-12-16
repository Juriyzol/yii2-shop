

<p>
базовые команды для Гита:

echo "# yii2-shop" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/Juriyzol/yii2-shop.git
git push -u origin master
</p>

<p>
Сразу после установки фреймворка, рабочая версия дефолтной страницы должна
запуститься по адресу, - домен_нашего_проекта\web.

Но при первом запуске мы получим ошибку.

Исправляется она следующим образом:
идем в папку домен\config и открываем фаил web.php
и пишем в 12 строке в качестве значения любую информацию.
Так же чля подключения ЧПУ добавим следующую строку:


        <?
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'qwerty', // пишем в это значение
            'baseUrl' => '', // добавляем строку для ЧПУ
        ],
        ?>

далее в этом же файле для создания ЧПУ раскомментируем слуедующие строки:        
        
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
Последнее что нам нужно сделать для запуска дефолтного проекта с 
работающим ЧПУ:


Добавляем .htaccess в корневой папке:

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


Добавляем .htaccess в корневой папке:

RewriteBase /

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule . index.php
</p>




