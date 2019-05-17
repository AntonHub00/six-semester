#!/bin/bash

file_to_parse=""

# Read the name of the database
if [ -z "${file_to_parse}" ]; then
    echo -n "Must provide a file name: "
    read file_to_parse
    echo

    if [ ! -e "${file_to_parse}" ]
    then
	echo "The file given doesn't exist in the current directory"
	exit 1
    fi
fi

cat ${file_to_parse} | awk '!(/\\$/){$NF="";sub(/[ \t]+$/,"")}1' | awk '!(/\\$/){$NF="";sub(/[ \t]+$/,"")}1' | awk '!(/\\$/){print $0";"}(/\\$/){print $0}'| awk '!(/^(\/\*)/){print $0}' > ${file_to_parse}
