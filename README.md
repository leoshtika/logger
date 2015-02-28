A simple PHP Logger class
--------
When using this library for the first time, it will create a "logfiles" folder in the root of your project, where all your log files will be placed, in different files for each month.

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](http://opensource.org/licenses/MIT)

## Requirements
- PHP 5.3 or higher


## Installation
You can use one of these 3 installation methods

#### 1) Using Composer (recommended)
- Using Composer from the command line
```
composer require leoshtika/logger:~1.0
```

- Or using Composer with composer.json file
```
{
    "require": {
        "leoshtika/logger": "~1.0"
    }
}
```

#### 2) Clone it from Github 
```
git clone https://github.com/leoshtika/logger.git
```

#### 3) Download it from Github
https://github.com/leoshtika/logger/archive/master.zip


## Usage

#### Using Composer
If you are using composer require the 'vendor/autoload.php' file
```php
<?php
require 'vendor/autoload.php';

use leoshtika\libs\Logger;

Logger::add();
Logger::add('Action must be taken immediately', Logger::LEVEL_EMERGENCY);
Logger::add('Interesting events', Logger::LEVEL_NOTICE);
```

#### Using the downloaded folder
If you donwloaded the folder manually then be sure to require the 'Logger.php' class
```php
<?php
require 'path/to/logger/src/Logger.php';

use leoshtika\libs\Logger;

Logger::add();
Logger::add('Action must be taken immediately', Logger::LEVEL_EMERGENCY);
Logger::add('Interesting events', Logger::LEVEL_NOTICE);
```


## Output
```
::1 [21/Sep/2014 12:42:41][INFO] (example.php) --> no message
::1 [21/Sep/2014 12:42:41][EMERGENCY] (example.php) --> Action must be taken immediately
::1 [21/Sep/2014 12:42:41][NOTICE] (example.php) --> Interesting events
```

Enjoy!
