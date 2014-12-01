#!/usr/bin/env bash

apt-get update

apt-get install -y apache2
rm -rf /var/www
ln -fs /vagrant /var/www

# Install MySQL Server in a Non-Interactive mode. Default root password will be empty.
echo "mysql-server-5.6 mysql-server/root_password password ''" | sudo debconf-set-selections
echo "mysql-server-5.6 mysql-server/root_password_again password ''" | sudo debconf-set-selections 
apt-get install -y mysql-server libapache2-mod-auth-mysql php5-mysql

# Install PHP.
sudo apt-get install -y php5 libapache2-mod-php5 php5-mcrypt
sed -i 's/DirectoryIndex/DirectoryIndex index.php/g' /etc/apache2/mods-available/dir.conf
