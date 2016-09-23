Backup for Mysql/MariaDB
=========

Install bash-script "backup.sh" for Mysql/MariaDB. And add it as cron job.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):

    backup_template_src_file: backup.sh.j2 # Path of a Jinja2 formatted template on the local server. This can be a relative or absolute path.
    backup_install_dir: /root/
    backup_db_host: localhost
    backup_db_user: root
    backup_db_pass: rootPass # "{{ mysql_root_pass }}"
    backup_expire_period: 7day
    backup_db_prefix: pfx%
    backup_hostname: project-name.local # "{{ hostname }}"
    backup_backups_dir: "/var/backups/{{ backup_hostname }}"
    backup_cron_hour: 3
    backup_cron_minute: 40
    backup_amazon_bucket: '' # bucket-name # Use '' for cancel sending to Amazon s3.
    backup_amazon_bucket_location: US # As of now the datacenters are: US (default), EU, us-west-1, and ap-southeast-1
    backup_amazon_bucket_dir: backups
    backup_amazon_expire_period: 7day
    backup_gs_bucket: '' # bucket-name # Use '' for cancel sending to Google Cloud Storage.

- If param `backup_amazon_bucket` is ''(empty string), backups won't send to Amazon s3.
- If param `backup_gs_bucket` is ''(empty string), backups won't send to Google Cloud Storage.

Dependencies
------------

- [MySQL](https://gitlab.mobidev.biz/ansible/mysql)  
or  
- [MariaDB](https://gitlab.mobidev.biz/ansible/mariadb-10-1)

For transfer:

- [Amazon S3 command](https://gitlab.mobidev.biz/ansible/s3cmd)   
or
- [Google Storage GSutil](https://gitlab.mobidev.biz/ansible/gsutil)

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).