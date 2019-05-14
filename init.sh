#!/bin/bash
# SCRIPT TO AUTOMATE SERVER SETUP

#init packages
#sudo yum install httpd -y
sudo yum install mariadb-server mariadb -y
sudo yum install php-mysql php-ftp php -y
#yum groupinstall "Development tools" -y
yum install net-tools -y
yum install nano -y
#sudo yum install git -y


systemctl start httpd.service
systemctl start httpd
systemctl start mariadb.service
systemctl start mariadb
firewall-cmd --permanent --add-service=http
systemctl restart firewalld
systemctl restart network
systemctl restart httpd
mysql -u root < dblibrary.sql