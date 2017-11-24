#!/bin/bash

echo "Setting up the web application..."
{
	sudo groupadd web
	sudo usermod -a -G web www-data
	sudo mkdir /app/
	sudo mkdir -p /app/choinski.net/{config,data,log,script,ssl,web}
	
	sudo openssl req -x509 -nodes -days 1825 -newkey rsa:2048 -keyout /app/cloudtskr.com/ssl/cloudtskr.key -out /app/cloudtskr.com/ssl/cloudtskr.crt -subj "/C=US/ST=MD/L=Churchville/O=cloudtskr.com/OU=Development/CN=cloudtskr.com/emailAddress=matt@choinski.net"
	
	sudo mv /tmp/choinski.net.conf /app/choinski.net/config/choinski.net.conf
	sudo cp /app/choinski.net/config/choinski.net.conf /etc/apache2/sites-available/choinski.net.conf
	sudo a2ensite choinski.net.conf
	sudo systemctl restart apache2
	
	sudo mv /tmp/choinski.net/* /app/choinski.net/web/
	sudo rm /app/choinski.net/web/Gruntfile.js
	sudo rm /app/choinski.net/web/package.json
	sudo rm -R /app/cloudtskr.com/web/node_modules/
	
	sudo chown -R vagrant /app/choinski.net/script/
	sudo chgrp -R web /app/choinski.net/script/
	sudo chown -R vagrant /app/choinski.net/web/
	sudo chgrp -R web /app/choinski.net/web/
} &> /dev/null
echo "...done."
