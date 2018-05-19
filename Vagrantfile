# -*- mode: ruby -*-
# vi: set ft=ruby :

# TODO: Any changes to the base box must be added by:
# vagrant package --base Ubuntu-Base

Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu"
  config.vm.box_url = "file://Users/mattchoinski/Development/Vagrant-Scripts/Ubuntu/ubuntu.box"

  config.vm.network :private_network, ip: "192.168.22.11"
  config.vm.network :forwarded_port, guest: 80, host: 8011

  config.ssh.forward_agent = true

  config.vm.provider :virtualbox do |vb|

    vb.name = "Shared Virtual Host"
    vb.customize ["modifyvm", :id, "--memory", "1024"]
    vb.customize ["modifyvm", :id, "--cpus", "1"]

  end

  config.vm.provision "file", source: "./script/choinski.net.conf", destination: "/tmp/choinski.net.conf"
  config.vm.provision "shell", path: "./script/setup-apache-php.sh"

  #config.vm.provision "file", source: "./web/", destination: "/tmp/choinski.net/"
  config.vm.provision "shell", path: "./script/setup-webapp.sh"

  config.vm.synced_folder ".", "/vagrant", disabled: true
  config.vm.synced_folder "web/", "/var/www/choinski.net/web/"

end
