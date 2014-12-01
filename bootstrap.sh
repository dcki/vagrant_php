#!/usr/bin/env bash

apt-get update

# Set the server timezone to Pacific Time.
echo "America/Los_Angeles" > /etc/timezone
dpkg-reconfigure --frontend noninteractive tzdata

# Install Apache.
apt-get install -y apache2
rm -rf /var/www
ln -fs /vagrant/www /var/www
rm /etc/apache2/sites-enabled/*
ln -s /vagrant/apache/apache-site /etc/apache2/sites-enabled/apache-site
ln -s /vagrant/apache/apache-site-ssl /etc/apache2/sites-enabled/apache-site-ssl
a2enmod rewrite

# Install MySQL Server in a Non-Interactive mode. Default root password will be empty.
echo "mysql-server-5.6 mysql-server/root_password password ''" | sudo debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again password ''" | sudo debconf-set-selections 
apt-get install -y mysql-server libapache2-mod-auth-mysql php5-mysql

# Install PHP.
apt-get install -y php5 libapache2-mod-php5 php5-mcrypt
sed -i 's/DirectoryIndex/DirectoryIndex index.php/g' /etc/apache2/mods-available/dir.conf

service apache2 restart
