#!/bin/bash
mysql -u localhost -u root -proot -D myblog << EOD1
CREATE TABLE blog_comments
(
name VARCHAR(40) NOT NULL,
emailid VARCHAR(255) NOT NULL,
comments VARCHAR(500) NOT NULL,
);

EOD1

