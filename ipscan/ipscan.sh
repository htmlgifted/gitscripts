#!/bin/bash
#This script is meant to report pingable
#ip address that are not supposed to be active.
#If active then will display outcome
# This script needs to be ran with Mutt installed.

#Scan your LAN for unauthorized IPs
#email Unauthorized ip
diff <(nmap -sP 192.168.0.2/254 | grep ^Host | sed 's/.appears to be up.//g' | sed 's/Host //g') /home/$USER/scripts/auth.hosts | sed 's/[0-9][a-z,A-Z][0-9]$//' | sed 's/</UNAUTHORIZED IP -/g' >> home/$USER/scripts/unath/unath.hosts && mutt your_email_adress@what_ever_mail.com -s "New Unauthorized Ip Address" -a unauth.hosts </dev/null