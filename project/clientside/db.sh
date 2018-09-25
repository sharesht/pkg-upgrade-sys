#!/bin/bash
#set -x
echo -n "For Existing Database Insert(e/E) or To Create New Database Insert(n/N) : "
read choice
if [ "$choice" = "e" ] || [ "$choice" = "E" ]
then
	echo -n "Enter Database Name : "
	read database
	mysql -e 'show databases;' > databases.txt
	while read name
	do
        	if [ $database = $name ]
        	then
        	        echo "Database Exists"
			mysql -e 'use '$database'; create table updates ( SerialNo int(4) not null primary key, PackageName varchar(50) not null, CurrentVersion varchar(25) not null, AvailableVersion varchar(25) );'
		else 
			echo "Database does not Exist"
			exit
		fi
	done<databases.txt
elif [ "$choice" == "n" ] || [ "$choice" == "N" ]
then
	echo -n "Enter Database Name : "
	read database
	mysql -e 'show databases;' > databases.txt
	while read name
	do
		if [ $database = $name ]
		then
			echo "Database Already Exist"
                        exit
		else
			mysql -e 'create database '$database';'
                        mysql -e 'use '$database'; create table updates ( SerialNo int(4) not null primary key, PackageName varchar(50) not null, CurrentVersion varchar(25) not null, AvailableVersion varchar(25) );'
		fi
	done<databases.txt
else
	echo "Wrong Choice"
	exit	
fi
mysql -e 'create user user'$database'@"%" identified by "Great@123"; grant all on '$database'.* to user'$database'@"%"; flush privileges;'
ip=`ip a | grep inet | awk -F '/' '{print $1}' | grep 10 | awk '{print $2}'`
printf '$servername = "'$ip'";\n$username = "user'$database'";\n$password = "Great@123";\n$dbname = "'$database'";' > dbdetails.txt


