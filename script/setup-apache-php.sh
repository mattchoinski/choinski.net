#!/bin/bash

echo "Installing Apache and PHP..."
{
	sudo apt-get update
	sudo apt-get install -qq apache2
	
	sudo a2enmod actions headers rewrite ssl
	sudo apt-get install -qq sqlite3 libsqlite3-dev
	sudo apt-get install -qq php php-cli php libapache2-mod-php php-mcrypt php-mongodb php7.0-sqlite3
	
	sudo a2dissite *default
	
	sudo sed -i "s|<Directory /var/www/>|<Directory /app/>|g" /etc/apache2/apache2.conf
	sudo sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf
	sudo systemctl restart apache2
} &> /dev/null
echo "...done."
