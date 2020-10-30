#!/bin/bash
# Author: Jamie Scott
# Created: May 2015
#
# DESCRIPTION:
# A BASH script to pull the Clestial Blessing status from ExtremeTK.
#
# Cron this script to run every 5 minutes.
# */5 * * * * /home/etkaddict/public_html/scripts/celestial-blessing.bash > /dev/null 2>&1

HOME_DIR=$(grep HOME_DIR ../.env | cut -d '"' -f2)
outputFile="$HOME_DIR/writable/etk_blessing"

scrape=$(curl "https://www.therealmofchaos.com/" | grep -A 10 -e "Celestial Blessing:" | tail -n 1)

blessingValue=$(echo $scrape | cut -d "/" -f 1)
blessingStatus=$(echo $scrape | cut -d ">" -f 2 | cut -d "<" -f 1)

echo $blessingValue > $outputFile
echo $blessingStatus >> $outputFile
chmod 644 $outputFile
