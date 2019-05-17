#!/bin/bash
# Simple script to backup MySQL databases

# Parent backup directory
backup_parent_dir="${HOME}/.my_mysql_baks"

# MySQL settings
mysql_user="root"
mysql_password=""
mysql_database=""


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


# Get MySQL databases
mysql_databases=`echo 'show databases' | /opt/lampp/bin/mysql --user=${mysql_user} --password=${mysql_password} -B | sed /^Database$/d`

db_exists=0

# Check if the database exists
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


echo "Creating backup of \"${mysql_database}\" database..."

# Creating backup var with the path to the backups directory
backup_date=`date +%Y_%m_%d__%H_%M_%S`
backup_file="${backup_parent_dir}/backup_${mysql_database}__${backup_date}.sql"
echo "Backup file: ${backup_file}"

/opt/lampp/bin/mysqldump --user=${mysql_user} --password=${mysql_password} ${mysql_database} > ${backup_file}
chmod 700 ${backup_file}

echo "Done!"
