#!/bin/bash

echo "Setting up the web application..."
{
	sudo mkdir /var/www/choinski.net/
	sudo mkdir -p /var/www/choinski.net/{config,data,log,script,ssl,web}
	
	sudo openssl req -x509 -nodes -days 1825 -newkey rsa:2048 -keyout /var/www/choinski.net/ssl/choinski.key -out /var/www/choinski.net/ssl/choinski.crt -subj "/C=US/ST=MD/L=Churchville/O=choinski.net/OU=Development/CN=choinski.net/emailAddress=hello@choinski.net"
	
	sudo mv /tmp/choinski.net.conf /var/www/choinski.net/config/choinski.net.conf
	sudo cp /var/www/choinski.net/config/choinski.net.conf /etc/apache2/sites-available/choinski.net.conf
	sudo a2ensite choinski.net.conf
	sudo systemctl restart apache2
	
	sudo chown -R vagrant /var/www/choinski.net/script/
	sudo chgrp -R www-data /var/www/choinski.net/script/
	sudo chown -R vagrant /var/www/choinski.net/web/
	sudo chgrp -R www-data /var/www/choinski.net/web/
} &> /dev/null
echo "...done."
