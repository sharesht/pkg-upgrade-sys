#!/bin/bash
set -x

grep -v -f /root/rs.txt /root/listnames.txt > /root/stopedservices.txt
