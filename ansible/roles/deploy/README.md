Deploy
=========

Install deploy role. Upload pack to server, unpack it to folder releases and create symlink at the end. Deploy without downtime.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):

    deploy_delegate_to: "127.0.0.1"  # "{{ prepare_delegate_to }}"
    deploy_name_prepare_pack: pack.tar.gz # "{{ prepare_hostname }}.tar.gz"
    deploy_src_prepare_pack: /tmp # "{{ prepare_tmp_project_dir }}/.."
    deploy_src_prepare_pack_gitlab_ci: "{{ prepare_tmp_project_dir if prepare_tmp_project_dir is defined else deploy_src_prepare_pack }}"
    deploy_remove_prepare_pack: true # remove prepeared project pack after copy
    deploy_shared_folders: [] # every element must be a folder. Relative path from project WITHOUT last slash "/"!
    deploy_project_name: projectName # "{{ prepare_project_name }}" # Folder
    deploy_install_composer: false
    deploy_stored_releases: 5
    deploy_folder_permissions: 764 # 777
    deploy_run_user: www-data
    deploy_run_group: www-data
    deploy_path_to_php_fpm: /var/run/php/php7.0-fpm.sock
    deploy_sql_dump_create: true
    deploy_sql_dump_is_mysql: true # For MySQL or MariaDB
    deploy_sql_dump_is_pgsql: false # For PostgreSQL
    deploy_sql_dump_host: localhost
    deploy_sql_dump_user: root
    deploy_sql_dump_user_password: pass
    deploy_sql_dump_port: 3306 # use 5432 or false for PostgreSQL

- shared_folders: [] - must by like:

        shared_folders: [
            'frontend/web/images',
            'storage'
          ]
      

Dependencies
------------

- [Prepare Deploy Pack](https://gitlab.mobidev.biz/ansible/prepare-deploy-pack)

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).