#!/bin/bash

sudo apt-get -y upgrade
apt list --upgradable | awk -F '/' '{print $1}' > uas.txt
tail -n +2 < uas.txt > upgradeallstatus.txt
if [ -s upgradeallstatus.txt ]
then
        while read line
        do
                echo "$line"
        done < upgradeallstatus.txt
        echo "Package(s) is/are not Upgraded";
        cat upgradeallstatus.txt | mail -s 'Package(s) Not Upgraded List' root@SHARESHT.in
else
        echo "All Packages are upgraded" | mail -s 'Package Status' root@SHARESHT.in
fi
