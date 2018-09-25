#!/bin/bash
#set -x

if [ -e /root/listservices.txt ] && [ -e /root/listnames.txt ]
then
        rm /root/listservices.txt /root/listnames.txt
fi

systemctl list-units --type service --all > /root/listservices.txt
while read line
do
        status=`echo $line | awk '{print $3}'`

        if [ "$status" = "active" ]
        then 
                echo "$line" | awk '{print $1}' >> /root/listnames.txt
        fi
done < /root/listservices.txt
