#!/bin/bash
# Simple script to backup MySQL databases

# Parent backup directory
backup_parent_dir="${HOME}/.my_mysql_baks"

# MySQL settings
mysql_user="root"
mysql_password=""
mysql_database=""
mysql_sql_file=""


# Read MySQL password from stdin if the var is no set
if [ -z "${mysql_password}" ]; then
    echo -n "Enter the password for ${mysql_user} user: "
    read -s mysql_password
    echo
fi


# Check MySQL password
echo exit | /opt/lampp/bin/mysql --user=${mysql_user} --password=${mysql_password} -B 2>/dev/null
if [ "$?" -gt 0 ]; then
    echo "The password for ${mysql_user} user is incorrect"
    exit 1
else
    echo "Password correct"
fi


# Read the name of the database
if [ -z "${mysql_database}" ]; then
    echo -n "Must provide database name: "
    read mysql_database
    echo
fi


# Get MySQL databases to check if exits the given one
mysql_databases=`echo 'show databases' | /opt/lampp/bin/mysql --user=${mysql_user} --password=${mysql_password} -B | sed /^Database$/d`

db_exists=0

for current_db in $mysql_databases
do
    if [ "$mysql_database" == "$current_db" ]; then
	db_exists=1
	break
    fi
done

if [ $db_exists -ne 1 ]; then
    echo "The DB doesn't exists"
    exit 1
fi


# Check if the file given exists
if [ -z "${mysql_sql_file}" ]; then
    echo -n "SQL file in youre backups folder: "
    read file
    echo

    mysql_sql_file="${backup_parent_dir}/${file}"

    if [ ! -e "${mysql_sql_file}" ]
    then
	echo "The file given doesn't exist in your backups folder"
	exit 1
    fi
fi


echo "Resoring backup${mysql_sql_file}..."

/opt/lampp/bin/mysql --user=${mysql_user} --password=${mysql_password} ${mysql_database} < ${mysql_sql_file}

echo "Done!"
