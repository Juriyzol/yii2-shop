

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
<p>
При создании из этих записей статьи для нагона текста
можно углубится в рассуждения о том почему по дефолту не подключен ЧПУ,
а так же о том что все эти танцы с бубном вокруг фреймворка окупятся со временем.

ну и так же помню что текстовую массу всегда можно нагнать комментариями.
</p>



<h2>Этап №2<h2>

<p>
Копируем файлы стилей верстки в, - домен\web\css
так же создаем тут иные необходимые нам папки,
такие как js, images, fonts и прочие паки из имеющейся верстки
Можем просто скопировать их из вестки в домен\web
</p>
<p>
Открываем index.html нашей верстке в редакторе и идем в папку
домен\views\layouts - там у нас находится единственый фаил main.php
переименуем его что-бы не удалять, например в _main.php и создадим
пустой фаил main.php, в который перенесем все содержимое из
индексного шаблона нашей верстки
</p>
<p>
Теперь идем в папку домен\assets и открываем фаил AppAsset.php,
который в фрейморке отвечает за...? - уточнить и спросить у Кормана

Копируем в публичное свойство $css класса AppAsset все css стили из
нашего шаблона:

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

*Если вы работаете в notepad++, то вам может очень пригодиться следующая информации
для удобства работы:
Мульти-редактирование

В Notepad++ есть шикарная опция — Мульти-редактирование, или мутиселект, кому как удобнее. С помощью сочетания кнопки Ctrl и клика левой кнопкой мышки можно выделить не только последовательные символы, но и разобщенные. Т.е. Выделить несколько тегов в разметке и одновременно изменить их все. По умолчанию, она, к сожалению, выключена. Включить легко Опции > Настройки > Правка > выбрать Мульти-редактирование.
и еще про нотепад, - http://blog.verha.net/hotkeys-notepad.html

Про подключение стилей по условию поговорим дальше

делаем тоже самое со скриптами, то есть вырезаем их в нашем шаблоне main.php
и переносим их в свойство $js класса AppAsset

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
??? нужно разобраться с depends ???

<?
    public $depends = [ // зависимости
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', // плагин
    ];   
?>

Поскольку в зависимостях у нас подключен плагин BootstrapAsset
мы закоментируем некоторые строки а так же поменяем название плагина,
конечный вид публичных свойств класса AppAsset должен иметь следующий вид:

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

* мы комментируем строки подключения по причене того, что 
в наших зависимостях плагин BootstrapPluginAsset уже подключает
файлы джеквери и бутстрапа..
Если хочестся использовать именно свои файлы то тогда нужно 
удалить или закоментировать строчку, - 'yii\bootstrap\BootstrapPluginAsset'

В любом случае смотрем в дебагере браузера что-бы небыло двойных подключений файла 
</p>
<h3>Выправляем шаблон, расставляем метки</h3>
<p>
Для того что-бы наш шаблон заработал нам нужно сделать ряд правок в нем, например
импортировать пространство имен и т.д.
Помните мы не удаляли наш дефолтный фаил main.php - сделано это было как раз
для того что-бы сейчас взять в нем все необходимое для запуска нашего нового шаблона.

Открываем фаил _main.php и копируем из него заголовок (все до <!DOCTYPE html>) 
в наш новый шаблон:


<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this); // регестрируем наш комплект стилей/скриптов
?>
<?php $this->beginPage() ?> // метка начала страницы

<!DOCTYPE html> <!-- эта строчка не нужна --> 

</p>
<p>
Прописываем язык:

<!DOCTYPE html>
<html lang="en"> // для начала заменим это строчку
<html lang="<?= Yii::$app->language ?>"> // на эту

а тем идем в уже знакомый нам фаил конфигурации - web.php, 
который находится по адресу - домен\config и добавляем в нем
следующую строку, можно перед строчкой компонентов с которой
мы уже работали:

<?
    'language' => 'ru_RU', // добавляем эту строчку
    'components' =>...
?>

продолжаем перенос шаблона:

меняем это:

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>

на это (так же берем из дефолтного переименованного шаблона):

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?> 
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

* Этот специальный метатег - <?= Html::csrfMetaTags() ?> - проверяет что
все формы отправки только с нашего сайта...

копируем остальные теги страницы на их места:

<body>
<?php $this->beginBody() ?>
...
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>    
</p>

<p>
Проверяем работоспособность страницы и видим что иконки не подключились.
Смотрим в дебагере и видим непорядок с путями

идем в наш корневой хитачес и добавляем там следующую строку:

Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on

RewriteCond %{REQUEST_URI} !^/(web)
RewriteRule ^assets/(.*)$ /web/assets/$1 [L]
RewriteRule ^css/(.*)$ web/css/$1 [L]
RewriteRule ^fonts/(.*)$ web/fonts/$1 [L] // добавляем вот эту вот строчку
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
Статья про две модели работы с клиентами (разговор с потенциальным работодателем из германии):

1) модель (модель успешного сотрудничества)
Вы продаете своему клиенту за дорого, вещь которую купили за дешево и я вам в этом
активно помагаю

2) модель (провальная)
Вы обещаете своему клиенту все и за любую цену которую он предложит. А потом это все
обещанное сваливаете на меня в виде задания с минимальной оплатой.
!!!
</p>

<p>

подключение кастомных файлов с определенными условиями:

    <?php
        $this->registerJsFile('js/html5shiv.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
        $this->registerJsFile('js/respond.min.js', ['position' => \yii\web\View::POS_HEAD, 'condition' => 'lte IE9']);
    ?>  

??? 
принцип записи что у подключения джаваскрипта, что у подключения вьюшки один и тот же,
мы первым значением передаем сам фаил а вторым значением передаем массив аргументов
в одном случае это будут сущности доступные в файле вьюшки, в другом случае это
список условий для подключения файла...
???    
    
</p>

<p>
И завершающий штрих:

Идем в наши вьюшки по адресу, - домен\yii-shop\views\site
открываем фаил index.php и удаляем в нем весь контент кроме:

<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

берем наш фаил main.php и вырезаем в нем всю контентную часть, которая находится
между тегами:
	</header><!--/header-->

    <?= $content; ?>
        
	<footer id="footer"><!--Footer-->

вырезанную часть вставляем в фаил index.php а на место вырезанной информации
ставим переменную $content
    
</p>
















