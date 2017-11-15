#####################################
THIS PROJECT IS DEVELOPED WITH YII2 #
#####################################



AFFECTED FILES
-------------
1- `Controllers/ProjectController`

2- `model/project.php`

4- `views/layout.php`

4- `views/project`

5- `web/assets/style.css`

6- `web/assets/json`

7- `web/js/script.js`

8- `config/db.php`

9- `config/urlManager.php`


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=',
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
];
```


Migration:
-Please navigate to the project path and execute the below command
~~~
php yii migrate
~~~



### You may need

the pretty url is enabled for this project so you may need to add this to your server config
~~~
<Directory "/path/to/your/project/web">
    # use mod_rewrite for pretty URL support
    RewriteEngine on
    # If a directory or a file exists, use the request directly
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    # Otherwise forward the request to index.php
    RewriteRule . index.php

    # ...other settings...
</Directory>
~~~


