#!/bin/bash
# SCRIPT TO AUTOMATE SERVER SETUP

init packages
sudo yum install httpd -y
sudo yum install mysql-server -y 
sudo yum install php-mysql php-ftp php -y
yum groupinstall "Development tools" -y
sudo yum install git -y

service networking restart
service httpd restart
service mysqld restart
mysql -u root < dblibrary.sql