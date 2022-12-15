---
author: lew
revision:
    "2019-08-19": "(A, lew) First edition."
...
Port forward {#pf}
=======================

### Network through port forwarding {#nwpf}

It's about *port forwarding* where you map a port on your local machine. When that port receives traffic, the traffic is forwarded to the virtual machine on a specific port. You *forward* the traffic from one port to another port (and machine).

Do this. Open the network settings on your virtual machine.

[FIGURE src=/image/linux/portforward.PNG caption="Network settings with the possibility of port forwarding."]

Click on "Port Forwarding". Click on "+"-button and add a rule as followed:

| Name     | Host Port    | Guest Port    |
|----------|:------------:|:-------------:|
| http     | 8080         | 80            |


<!-- [FIGURE src=/image/linux/portforwardrules.PNG caption="Port forwarding for ssh and http."] -->

You now have a rule for port forwarding that says:

<!-- 1. Trafik till localhost:2222 skickas vidare till den virtuella maskinen port 22. -->
1. Traffic to localhost:8080 are redirected to the virtual machine port 80.
