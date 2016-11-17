# Templatr

Thank you for choosing Templatr!

Templatr is an HTML component package for use with Laravel

* * *

## Steps to download

1.  Clone Manley/Templatr package into a folder called packages in the root of your Laravel project.
2.  Add TemplatrServiceProvider to your list of Service providers, then run in the console, composer dump-autoload.
3.  In the console, run php artisan vendor:publish to publish the views and assets.

* * *

## How To Use

1.  From your blade views, you can use a component by using the blade syntax but make sure to use the {!! !!}} version.
2.  An example of use would be {!! \Manley\Templatr\Link::make('/','home', ['btn', 'btn-link']) !!}

* * *

### All of the components are in the src/GUILibrary folder for reference. All components have one static function, make and take at least two arguments, the last being an array of class names.