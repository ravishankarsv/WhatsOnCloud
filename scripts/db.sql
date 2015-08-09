# Dump of table blog_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_comments`;

CREATE TABLE `blog_comments` (
  `name` varchar(255) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL
);
