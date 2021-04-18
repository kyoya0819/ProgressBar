## Very simple progress bar script.

### INSTALL

```
% composer require kyoya0819/progress-bar
```

### USAGE

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use kyoya0819\ProgressBar\ProgressBar;

$progress_bar = new ProgressBar();

for ($i = 1; $i <= 100; $i++) {
    usleep(20000);
    echo $progress_bar->view($i, 100, 'Here is message');
}
```

### LICENSE

[MIT LICENSE](https://github.com/kyoya0819/ProgressBar/blob/1.x/LICENSE)

