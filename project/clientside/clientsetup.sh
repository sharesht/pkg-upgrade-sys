#!/bin/bash
set -x

cd /root/
touch checkupgrade333.sh
print "'#!/bin/bash\n
#set -x\n
i=0\n
\n
if [ -d /PkgUpgdSys ]\n
then\n
	cd /PkgUpgdSys\n
else\n
	mkdir /PkgUpgdSys\n
	cd /PkgUpgdSys\n
fi\n
\n
apt-get update\n
apt list --upgradable | awk -F '/' '{print $1}' > ListNew\n
tail -n +2 < ListNew > ListNew2\n
\n
if [ -s ListNew2 ]\n
then\n
	mysql -u root -e 'use packages; delete from updates;'\n
	while read line \n
	do\n
		i=$((i+1))\n
		#echo $line\n
		CV=`apt-cache policy $line | grep Installed | awk '{print $2}'`\n
		#echo "$line -> Current Version : $CV" \n
		AV=`apt-cache policy $line | grep Candidate | awk '{print $2}'`\n
		#echo "Available Version : $AV"\n
		mysql -u root -e 'insert into packages.updates ( SerialNo, PackageName, CurrentVersion, AvailableVersion ) values ( "'$i'", "'$line'", "'$CV'", "'$AV'" );'\n
	done < ListNew2\nmysql -u root -e 'select * from packages.updates;'\n
else\n
	echo No Updates\n 
 	mysql -u root -e 'use packages; delete from updates;'\n
fi'" > checkupgrade333.sh
