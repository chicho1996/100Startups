<?php

session_start();
mysql_connect('localhost', 'root', 'tokotoko21')or die(mysql_errno());
mysql_select_db('100Startups')or die(mysql_error());

mysql_set_charset('utf8');
mysql_query('SET CHARACTER SET utf8');
