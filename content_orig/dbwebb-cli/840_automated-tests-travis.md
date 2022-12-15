---
author: mos
updated: "2017-06-27"
...
Automatiserade tester på Travis
==================================

Varje gång man checkar in kod till kursrepot på GitHub, eller om någon gör en pull request, så körs en automatiserad testsuite på webbtjänsterna Travis CI och CircleCI. CI står för continuous integration.



Nuvarande status {#status}
----------------------------------

Så här ser nuvarande status ut för de senaste testerna som körts på Travis CI och CircleCI.

| Kursrepo | Status [Travis](https://travis-ci.org/) | Status [CircleCI](https://circleci.com/) |
|----------|:------:|:------:|
| [htmlphp](https://github.com/dbwebb-se/htmlphp) | [![Build Status](https://travis-ci.org/dbwebb-se/htmlphp.svg?branch=master)](https://travis-ci.org/dbwebb-se/htmlphp) | [![CircleCI](https://circleci.com/gh/dbwebb-se/htmlphp.svg?style=svg)](https://circleci.com/gh/dbwebb-se/htmlphp) |
| [python](https://github.com/dbwebb-se/python) | [![Build Status](https://travis-ci.org/dbwebb-se/python.svg?branch=master)](https://travis-ci.org/dbwebb-se/python) | [![CircleCI](https://circleci.com/gh/dbwebb-se/python.svg?style=svg)](https://circleci.com/gh/dbwebb-se/python) |
| [design](https://github.com/mosbth/design) | [![Build Status](https://travis-ci.org/dbwebb-se/design.svg?branch=master)](https://travis-ci.org/dbwebb-se/design) | [![CircleCI](https://circleci.com/gh/dbwebb-se/design.svg?style=svg)](https://circleci.com/gh/dbwebb-se/design) | 
| [javascript1](https://github.com/dbwebb-se/javascript1) | [![Build Status](https://travis-ci.org/dbwebb-se/javascript1.svg?branch=master)](https://travis-ci.org/dbwebb-se/javascript1) | [![CircleCI](https://circleci.com/gh/dbwebb-se/javascript1.svg?style=svg)](https://circleci.com/gh/dbwebb-se/javascript1) | 
| [linux](https://github.com/dbwebb-se/linux) | [![Build Status](https://travis-ci.org/dbwebb-se/linux.svg?branch=master)](https://travis-ci.org/dbwebb-se/linux) | [![CircleCI](https://circleci.com/gh/dbwebb-se/linux.svg?style=svg)](https://circleci.com/gh/dbwebb-se/linux) | 
| [oopython](https://github.com/dbwebb-se/oopython) | [![Build Status](https://travis-ci.org/dbwebb-se/oopython.svg?branch=master)](https://travis-ci.org/dbwebb-se/oopython) | [![CircleCI](https://circleci.com/gh/dbwebb-se/oopython.svg?style=svg)](https://circleci.com/gh/dbwebb-se/oopython) |
| [webapp](https://github.com/dbwebb-se/webapp) | [![Build Status](https://travis-ci.org/dbwebb-se/webapp.svg?branch=master)](https://travis-ci.org/dbwebb-se/webapp) | [![CircleCI](https://circleci.com/gh/dbwebb-se/webapp.svg?style=svg)](https://circleci.com/gh/dbwebb-se/webapp) |
| [oophp](https://github.com/dbwebb-se/oophp) | [![Build Status](https://travis-ci.org/dbwebb-se/oophp.svg?branch=master)](https://travis-ci.org/dbwebb-se/oophp) | [![CircleCI](https://circleci.com/gh/dbwebb-se/oophp.svg?style=svg)](https://circleci.com/gh/dbwebb-se/oophp) |
| [ramverk1](https://github.com/dbwebb-se/ramverk1) | [![Build Status](https://travis-ci.org/dbwebb-se/ramverk1.svg?branch=master)](https://travis-ci.org/dbwebb-se/ramverk1) | [![CircleCI](https://circleci.com/gh/dbwebb-se/ramverk1.svg?style=svg)](https://circleci.com/gh/dbwebb-se/ramverk1) |
| [ramverk2](https://github.com/dbwebb-se/ramverk2) | [![Build Status](https://travis-ci.org/dbwebb-se/ramverk2.svg?branch=master)](https://travis-ci.org/dbwebb-se/ramverk2) | [![CircleCI](https://circleci.com/gh/dbwebb-se/ramverk2.svg?style=svg)](https://circleci.com/gh/dbwebb-se/ramverk2) |
| [webgl](https://github.com/dbwebb-se/webgl) | [![Build Status](https://travis-ci.org/dbwebb-se/webgl.svg?branch=master)](https://travis-ci.org/dbwebb-se/webgl) | [![CircleCI](https://circleci.com/gh/dbwebb-se/webgl.svg?style=svg)](https://circleci.com/gh/dbwebb-se/webgl) |
| [dbjs](https://github.com/dbwebb-se/dbjs) | [![Build Status](https://travis-ci.org/dbwebb-se/dbjs.svg?branch=master)](https://travis-ci.org/dbwebb-se/dbjs) | [![CircleCI](https://circleci.com/gh/dbwebb-se/dbjs.svg?style=svg)](https://circleci.com/gh/dbwebb-se/dbjs) |
| [phpmvc](https://github.com/dbwebb-se/phpmvc) | [![Build Status](https://travis-ci.org/dbwebb-se/phpmvc.svg?branch=master)](https://travis-ci.org/dbwebb-se/phpmvc) | [![CircleCI](https://circleci.com/gh/dbwebb-se/phpmvc.svg?style=svg)](https://circleci.com/gh/dbwebb-se/phpmvc) |
| [javascript](https://github.com/dbwebb-se/javascript) | [![Build Status](https://travis-ci.org/dbwebb-se/javascript.svg?branch=master)](https://travis-ci.org/dbwebb-se/javascript) | [![CircleCI](https://circleci.com/gh/dbwebb-se/javascript.svg?style=svg)](https://circleci.com/gh/dbwebb-se/javascript) |



Konfigurering av tester {#config}
----------------------------------

Varje kursrepo har en konfigurationsfil `.travis.yml` respektive `circle.yml` som styr vad som testas. I princip är det den [lokala utvecklingsmiljön](development-environment) som används via följande kommandosekvens.

```bash
$ make automated-tests-prepare automated-tests-check automated-tests-run
```

Om du har installerat en lokal utvecklingsmiljö så kan du alltså köra exakt samma tester lokalt.
