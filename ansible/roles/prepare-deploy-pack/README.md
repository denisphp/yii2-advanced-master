Prepare deploy pack
=========

Install role for prepare deploy pack. Role pack project into tar.gz.

Requirements
------------

Ubuntu trusty with the package python-pycurl and python-software-properties installed.

Role Variables
--------------

Available variables are listed below, along with default values (see [defaults/main.yml](defaults/main.yml) ):

    prepare_hostname: projectHostName # "{{ hostname }}"
    prepare_project_name: projectName # Folder name without /var/www/
    prepare_compress: true # Compress JS & CSS files
    prepare_tmp_project_dir: /tmp/projectName
    prepare_git_repo: git@gitlab.mobidev.biz:web/projectName.git
    prepare_branch: dev
    prepare_compress_files: [
        { dir: 'frontend/web/js/', type: 'js'},
        { dir: 'frontend/web/css/', type: 'css'}
      ]
    prepare_install_composer: false
    prepare_remove_files: [
        'nbproject',
        'build',
        'provision',
        'ansible',
        '.DS_Store',
        '.gitignore',
        '.git',
        '.idea',
        'yuicompressor.jar',
        'README.md',
        'Vagrantfile'
      ]
      
- prepare_hostname: projectHostName # "{{ hostname }}" - used for name of pack.
- prepare_project_name: projectName # Folder - must by a directory. Only name, without /var/www/

Dependencies
------------

None.

License
-------

MIT

Author Information
------------------

[MobiDev](http://mobidev.biz/).
