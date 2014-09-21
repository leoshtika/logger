A simple PHP Logger class
--------

## Requirements
- PHP 5.3 or higher

## Installation

### Using Composer
- From the command line
```
composer require leoshtika/logger:1.0.*
```

- From composer.json file
```
{
    "require": {
        "leoshtika/logger": "1.0.*"
    }
}
```


## Usage

### Using Composer
```php
<?php
require 'vendor/autoload.php';

use leoshtika\libs\Logger;

Logger::add();
Logger::add('Action must be taken immediately', Logger::LEVEL_EMERGENCY);
Logger::add('Interesting events', Logger::LEVEL_NOTICE);
```

### Copy directory
```
git clone https://github.com/leoshtika/logger.git
```

```php
<?php
require 'Logger.php';

use leoshtika\libs\Logger;

Logger::add();
Logger::add('Action must be taken immediately', Logger::LEVEL_EMERGENCY);
Logger::add('Interesting events', Logger::LEVEL_NOTICE);
```

### Output
```
::1 [21/Sep/2014 12:42:41][INFO] (example.php) --> no message
::1 [21/Sep/2014 12:42:41][EMERGENCY] (example.php) --> Action must be taken immediately
::1 [21/Sep/2014 12:42:41][NOTICE] (example.php) --> Interesting events
```
