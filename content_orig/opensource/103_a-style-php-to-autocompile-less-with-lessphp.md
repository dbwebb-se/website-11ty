---
author: mos
category: php
updated: "2014-03-16 22:19:04"
created: "2014-03-13 17:04:50"
...
A style.php to autocompile LESS with lessphp
==================================

The script, `style.php`, is a wrapper to the lessphp compiler, enabling autocompiling of LESS-files to a CSS-file and utilizing gzip and browser caching together with easy access to configuration options through a config-file.

`style.php` makes it easier for advanced use of server-side compiling of `style.less` to `style.css`.

<!--more-->

The project includes essentials from lessphp to make it a working example. Just clone it and point your browser to the installation directory. You need to make the directory writable for the webserver since lessphp creates a cache-file `style.less.cache` and writes the resulting `stylesheet.css`.



License {#license}
--------------------------------------

The `style.php` is free software and open source software, licensed according MIT.

Read about the [lessphp compiler](http://leafo.net/lessphp/), written in PHP and subject to its own license.

Read about the [LESS language](http://lesscss.org/). The creators of LESS also built a JavaScript compiler, suitable for client or serverside compilation of LESS-files.



Requirements {#reqs}
--------------------------------------

`style.php` requires PHP 5.3 and uses lessphp. 



Installation {#install}
--------------------------------------



###Clone it from GitHub {#clone}

The [sourcode is available on GitHub](https://github.com/mosbth/stylephp). Clone, fork or [download as zip](https://github.com/mosbth/stylephp/archive/master.zip). 

I prefer cloning like this.

```bash
git clone git://github.com/mosbth/stylephp.git
```

Make the directory writable by the webserver. It will create the files `style.less.cache` and `style.css`.

```bash
chmod 777 stylephp
```


###Verify installation {#verify}

Point your web browser to the installation directory and the test file `index.php`. It should look something like this.

[FIGURE src=/image/snap/lessphp-index.png?w=w2&sa=jpg caption="The testfile uses `style.php` to create `style.css` from `style.less`."]

To verify that it works, try editing `style.less` and change the value of `@bgcolor`. 

```css
@bgcolor: #a3a3fe;
```

Reload the page and the background color should change appropriately, review the [troubleshooting section](#trouble), if it does not. 



Basic usage {#usage}
--------------------------------------

`style.php` uses lessphp for serverside compile LESS to CSS. `style.php` uses the function `autoCompileLess()` which is described in the lessphp manual. It adds gzip-encoding and enable sending header 304 Not Modified when the stylesheet is unchanged.

It works like this.

1. `style.php` is requested as a ordinary PHP-file.
2. `style.php` takes `style.less`, if it has changed, and feeds it into lessphp.
3. lessphp compiles `style.less` into `style.css`.

Use it like this.



###Use `style.php` as a stylesheet {#asstyle}

Add the `style.php` as a styleshet to your webpage.

```html
<link rel='stylesheet' type='text/css' href='style.php' />
```

To see what happens, right click on your webpage and view its source, then click on `style.php` and view the generated CSS. The resulting CSS is stored in `style.css`.

[FIGURE src=/image/snap/stylephp-view-source.png caption="Click on the stylesheet `style.php` and see the generated CSS as a result."]

You can bypass `style.php` and use the generated `style.css` instead. This is useful when switching to a production environment.

```html
<link rel='stylesheet' type='text/css' href='style.css' />
```



###Configuration options in `style_config.php` {#style-config}

There is a default `style_config.php` which works from the start. [Review its default settings](https://github.com/mosbth/stylephp/blob/master/style_config.php).

You can configure it to use lessphp-settings and set where to find the lessphp compiler files.

You will need to read the lessphp manual, to review the configuration options.



###Make use of another config-file {#another}

If you want to try out `style.php` with anouther config-file, then create, for example, a `style-debug.php` and make it look like this.

```php
define('STYLE_CONFIG', __DIR__ . '/style-debug_config.php');
include "style.php";
```

This enables you to have different ways of producing the stylesheet, perhaps one config-file for development (keeping comments) and one for production (remove comments and compress).



A sample installation {#installation}
--------------------------------------

You can see the [sample installation here](kod-exempel/lessphp), together with its [source code](kod-exempel/source.php?dir=lessphp).



Troubleshooting {#trouble}
--------------------------------------

1. The stylesheet is not updated.

    Point your browser directly to the file `style.php` and see if you get any error.


2. `style.php` does not generate an updated `style.css` nor a `style.less.cache`.

    Remove the files `style.css` and `style.less.cache`, and ensure that the directory is writable and try again.



Trouble and feature requests {#tr}
--------------------------------------

Use [GitHub to report issues](https://github.com/mosbth/stylephp/issues). Always include the following.

1. Describe very shortly: What are you trying to achieve, what happens, what did you expect.
2. Any changes made to the `style_config.php`
3. The relevant part from `style.less`, if any.

If you request a feature, describe its usage and argument for why it fits into `style.php`.

Feel free to fork, clone and create pull requests.



Revision {#revision}
--------------------------------------

<span class='revision-history' markdown='1'>
2014-03-17 (A, mos) First release on dbwebb/opensource as part of course material for phpmvc-course.  
</span>

