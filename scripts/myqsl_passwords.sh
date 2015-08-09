#!/bin/bash
mysql -u root << EOF
UPDATE mysql.user SET Password=PASSWORD('root') WHERE User='root';
FLUSH PRIVILEGES;
CREATE DATABASE myblog;
EOF
