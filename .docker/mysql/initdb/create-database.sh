#!/usr/bin/env bash
echo "--------------------------------------------------------"
echo "Create database!"
mysql \
--user='root' \
--password=${MYSQL_ROOT_PASSWORD} \
--execute "CREATE TABLE db.url
           (
             id VARBINARY(256) PRIMARY KEY NOT NULL,
             url VARCHAR(2048) NOT NULL
           );
           CREATE UNIQUE INDEX url_id_uindex ON db.url (id);"

echo "--------------------------------------------------------"

