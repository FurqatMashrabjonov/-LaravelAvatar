# Laravel Avatar generator


With this package you can make SVG avatar with first letter of first name and surname or other words



## Installation


```bash
composer require furqat/laravel-avatar

php artisan vendor:publish --provider="Furqat\LaravelAvatar\LaravelAvatarServiceProvider"
```

## Usage

In the config/avatar.php file you can edit default values

```php
    'size' => 80,

    'background_color' => '#8b75b7',

    'font_family' => 'Arial',

    'font_color' => '#ffffff',
```

```php
use Furqat\LaravelAvatar\SvgAvatar;
$user = User::first();

// In this example avatar generate using with config styles
$avatar = new SvgAvatar('Furqat Mashrabjonov');
$user->avatar = $avatar->generate();
$user->save();

//or

//In this example you can change styles
$avatar = new SvgAvatar('Furqat Mashrabjonov');
$avatar->size(300);
$avatar->backgroundColor('#f00');
$avatar->color('#000');
$avatar->fontFamily('sans-serif');

$user->avatar = $avatar->generate();
$user->save();
```


### Result

![Result](./docs/images/preview.png)


## License
[MIT](https://choosealicense.com/licenses/mit/)
