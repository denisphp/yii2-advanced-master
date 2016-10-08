Yii 2 Advanced Project Template
===============================

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

Installation
=========

## Install Ansible

```
$ sudo apt-get install software-properties-common
$ sudo apt-add-repository ppa:ansible/ansible
$ sudo apt-get update
$ sudo apt-get install ansible
```

## Installation on OS X

<http://docs.ansible.com/ansible/intro_installation.html#latest-releases-via-pip>

Vagrant:
=========

## First of all, Enabling virtualization extensions in BIOS
- Reboot the computer and open the system's BIOS menu. This can usually be done by pressing the delete key, the F1 key or Alt and F4 keys depending on the system.
- Enabling the virtualization extensions in BIOS:
    1. Open the Processor submenu The processor settings menu may be hidden in the Chipset, Advanced CPU Configuration or Northbridge.
    2. Enable Intel Virtualization Technology (also known as Intel VT-x). AMD-V extensions cannot be disabled in the BIOS and should already be enabled. The virtualization extensions may be labeled Virtualization Extensions, Vanderpool or various other names depending on the OEM and system BIOS.
    3. Enable Intel VT-d or AMD IOMMU, if the options are available. Intel VT-d and AMD IOMMU are used for PCI device assignment.
    4. Select Save & Exit.
- Reboot the machine.

### install nfs

```
sudo apt-get install nfs-kernel-server nfs-common rpcbind
```

## Install Virtual Box

<https://www.virtualbox.org/wiki/Downloads>

## Download and Install Vagrant

<http://www.vagrantup.com/downloads.html>

### install Vagrant plugins

```
vagrant plugin install vagrant-vbguest vagrant-cachier vagrant-hostsupdater
```

How to use vagrant?
=========

First of all, read docs: <https://www.vagrantup.com/docs/getting-started/up.html>

***Useful commands***:

- Run virtual machine: `vagrant up`
- SSH into virtual machine: `vagrant ssh`
- Run provisioning: `vagrant provision`
- Stop virtual machine: `vagrant halt`
- Destroy virtual machine: `vagrant destroy`

*PS: Go to your project folder before running command!*

License
-------

MIT