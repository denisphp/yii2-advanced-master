Supervisor
=========

Install Supervisor. Supervisor is a client/server system that allows its users to monitor and control a number of processes on UNIX-like operating systems.

Official site: <http://supervisord.org/>

Requirements
------------

Supervisor has been tested and is known to run on Linux (Ubuntu 9.10), Mac OS X (10.4/10.5/10.6), and Solaris (10 for Intel) and FreeBSD 6.1. It will likely work fine on most UNIX systems.

Supervisor will not run at all under any version of Windows.

Supervisor is known to work with Python 2.4 or later but will not work under any version of Python 3.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):

    supervisord_default_conf_file: supervisord.conf

Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).
