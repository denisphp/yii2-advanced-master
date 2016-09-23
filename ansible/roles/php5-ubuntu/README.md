PHP5-ubuntu
=========

Install PHP 5.x version.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml)):

    php5_ppa: "ppa:ondrej/php5" #"ppa:ondrej/php5-5.6" # For PHP 5.6
    php5_error_reporting: E_ALL & ~E_DEPRECATED
    php5_display_errors: 'Off'
    php5_upload_max_filesize: 20M
    php5_post_max_size: 25M
    php5_max_execution_time: 30
    php5_memory_limit: 128M
    php5_file_uploads: On
    php5_max_file_uploads: 20
    php5_packages: [
        php5,
        php5-fpm,
        php5-dev,
        php5-cli,
        php5-pgsql,
        php5-mysql,
        php5-curl,
        php5-gd,
        php5-mcrypt
    ]
    php5_apache2_template_src: apache_php.ini.j2 # Path of a Jinja2 formatted template on the local server. This can be a relative or absolute path.
    php5_fpm_template_src: fpm_php.ini.j2 # Path of a Jinja2 formatted template on the local server. This can be a relative or absolute path.


Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).
