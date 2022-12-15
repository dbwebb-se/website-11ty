---
author: mos
category: php
updated: "2014-02-12 14:40:17"
created: "2014-02-12 14:40:14"
...
CImage release v0.5 & v0.5.1
==================================

This is release v0.5 & v0.5.1, which adds features and may break backward compatibility.

<!--more--> 

v0.5.1 (2014-02-12)

* Display image in README-file.
* Create an empty `cache` directory as part of repo.


v0.5 (2014-02-12)

* Change constant name `CImage::PNG_QUALITY_DEFAULT` to `CImage::PNG_COMPRESSION_DEFAULT`.
* Split JPEG quality and PNG compression, `CImage->quality` and `CImage->compression`
* Changed `img.php` parameter name `d, deflate` to `co, compress`.
* Separating configuration issues from `img.php` to `img_config.php`.
* Format code according to PSR-2.
* Disabled post-processing JPEG and PNG as default.
* This version is supporting PHP 5.3, later versions will require 5.5 or later.
* Using GitHub issue tracking for feature requests and planning.
* Rewrote [the manual](http://dbwebb.se/opensource/cimage).
* Created directory `webroot` and moved some files there.
