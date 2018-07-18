# -*- mode: ruby -*-
# vi: set ft=ruby :

require './etc/vagrant-provision-reboot-plugin'

Vagrant.configure("2") do |config|

  config.vm.box = "centos/7"
  config.ssh.insert_key = false
  config.vm.network "private_network", ip: "192.168.254.254"
  config.vm.hostname = "domin8or.local"
  config.vm.synced_folder "./", "/vagrant", type: "rsync", rsync__auto: true, rsync__exclude: ['./vendor','./composer.lock', './.git', './.idea']
  config.vm.provision :shell, path: "./etc/provision.sh"
  config.vm.provision :unix_reboot

end