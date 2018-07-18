#!/usr/bin/env bash

# Register latest EPEL repo
rpm -Uvh http://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm

# Install PHP-FPM and required extensions
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
yum --enablerepo=remi,remi-php72 install -y php-fpm php-common
yum --enablerepo=remi,remi-php72 install -y php-pecl-mcrypt php-ctype php-pdo php-mbstring php-redis php-dom
systemctl enable php-fpm

# Install Nginx
echo -e "[nginx]\nname=nginx repo\nbaseurl=http://nginx.org/packages/centos/7/x86_64\ngpgcheck=0\nenabled=1" >> /etc/yum.repos.d/nginx.repo
yum install -y nginx
systemctl enable nginx

# Install Redis
yum install -y redis
systemctl enable redis

# Install some other components
yum install -y nano vim wget ntp git

# Set PHP timezone
sed -i "902 c date.timezone = UTC" /etc/php.ini

# Disable SELinux
systemctl disable firewalld
sed -i "7 c SELINUX=disabled" /etc/selinux/config

# Install Composer
cd /vagrant
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
rm -f composer-setup.php
mv composer.phar /usr/bin/composer

# Remove any Composer libraries that were uploaded at VM creation
# (since these may only be compatible with the host environment)
rm -rf vendor
rm -f vendor.lock

# Install Composer libraries
composer install