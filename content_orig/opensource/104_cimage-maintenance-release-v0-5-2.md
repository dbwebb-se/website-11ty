---
author: mos
category: php
updated: "2014-04-01 07:09:49"
created: "2014-04-01 07:07:33"
...
CImage maintenance release v0.5.2
==================================

This is maintenance release v0.5.2, which corrects bugs.

<!--more--> 

v0.5.2 (2014-04-01)

* Correcting issue #26 providing error message when not using postprocessing.
* Correcting issue #27 warning of default timezone.
* Removed default $config options in `img.php`, was not used, all configuration should be in `img_config.php`.
* Verified known bug - sharpen acts as blur in PHP 5.5.9 and 5.5.10 #28
