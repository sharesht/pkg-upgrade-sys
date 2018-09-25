#set -x
i=0

if [ -d /PkgUpgdSys ]
then
        cd /PkgUpgdSys
else
        mkdir /PkgUpgdSys
        cd /PkgUpgdSys
fi

apt-get update
apt list --upgradable | awk -F '/' '{print $1}' > ListNew
tail -n +2 < ListNew > ListNew2

if [ -s ListNew2 ]
then
        mysql -u root -e 'use packages; delete from updates;'
        while read line 
        do
                i=$((i+1))
                        #echo $line
                CV=`apt-cache policy $line | grep Installed | awk '{print $2}'`
                        #echo "$line -> Current Version : $CV" 
                AV=`apt-cache policy $line | grep Candidate | awk '{print $2}'`
                        #echo "Available Version : $AV"
                mysql -u root -e 'insert into packages.updates ( SerialNo, PackageName, CurrentVersion, AvailableVersion ) values ( "'$i'", "'$line'", "'$CV'", "'$AV'" );'
        done < ListNew2
mysql -u root -e 'select * from packages.updates;' | mail -s 'Package Upgrades Available' root@SHARESHT.in
else
        echo "No Updates"
        mysql -u root -e 'use packages; delete from updates;'
fi
