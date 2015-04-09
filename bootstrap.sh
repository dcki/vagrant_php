#!/usr/bin/env bash

apt-get update

# Set the server timezone to Pacific Time.
echo "America/Los_Angeles" > /etc/timezone
dpkg-reconfigure --frontend noninteractive tzdata

# Install Apache.
# RUNLEVEL=1 should prevent automatic start of Apache after install.
RUNLEVEL=1 apt-get install -y apache2
# This is an extra precaution to prevent Apache from running before it is
# correctly configured.
service apache2 stop
rm -rf /var/www
ln -fs /vagrant/www /var/www
rm /etc/apache2/sites-enabled/*
ln -s /vagrant/apache/common.conf /etc/apache2/common.conf
ln -s /vagrant/apache/site /etc/apache2/sites-available/site
ln -s /vagrant/apache/ssl /etc/apache2/sites-available/ssl
a2enmod rewrite

# Fix permissions.
rm /etc/apache2/httpd.conf
ln -s /vagrant/apache/httpd.conf /etc/apache2/httpd.conf

# Install MySQL Server in a Non-Interactive mode. Default root password will be empty.
echo "mysql-server-5.6 mysql-server/root_password password test1234" | sudo debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again password test1234" | sudo debconf-set-selections
apt-get install -y mysql-server libapache2-mod-auth-mysql php5-mysql

# Install PHP.
apt-get install -y php5 libapache2-mod-php5 php5-mcrypt

# Enable the site.
# If we enable the site earlier, while setting up, then everything in site
# directories, including source code, may be publicly accessible until
# installation is complete.
a2ensite site
a2ensite ssl
service apache2 restart
