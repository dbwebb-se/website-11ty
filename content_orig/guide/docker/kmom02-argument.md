---
author: lew
revision:
    "2019-03-14": "(A, lew) Första versionen."
...
Argument och variabler
=======================

I byggfasen kan vi automatisera 

```
FROM debian:buster-slim
ARG user

RUN apt-get update && \
    apt-get -y install nano \
    sudo

WORKDIR scripts

COPY scripts/* /scripts/

RUN chmod +x /scripts/*.bash
RUN useradd -m $user && echo "$user:docker" | chpasswd && adduser $user sudo

USER $user
```
