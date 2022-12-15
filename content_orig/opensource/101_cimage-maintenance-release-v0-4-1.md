---
author: mos
category: php
updated: "2014-01-27 12:28:01"
created: "2014-01-27 12:27:15"
...
CImage maintenance release v0.4.1
==================================

This is a maintenance release for v0.4.

<!--more--> 

v0.4.1 (2014-01-27)

* Changed => to == on Modified-Since.
* Always send Last-Modified-Header.
* Added `htmlentities()` to verbose output.
* Fixed support for jpeg, not only jpg.
* Fixed crop whole image by setting crop=0,0,0,0
* Use negative values for crop width & height to base calulation on original width/height and withdraw selected amount.
* Correcting jpeg when setting quality.
* Removed obsolete reference to `$newName` in `CImage::__construct()` (issue 1). 

