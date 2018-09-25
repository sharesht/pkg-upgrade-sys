#!/bin/bash
#set -x

if [ -e /root/runningservices.txt ] && [ -e /root/rs.txt ]
then
        rm /root/runningservices.txt /root/rs.txt
fi

systemctl list-units --type service --all > /root/runningservices.txt
while read line
do
        status=`echo $line | awk '{print $3}'`

        if [ "$status" = "active" ]
        then
                echo "$line" | awk '{print $1}' >> /root/rs.txt
        fi
done < /root/runningservices.txt
