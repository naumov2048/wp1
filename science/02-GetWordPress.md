# Get WordPress

1. Getting rid of placeholder stuff. Move stuff from `www/` folder to `www/lamp/`. 
This will break links in those html files but we do not care.

2. Download wordpress from [https://wordpress.org/download/releases/](https://wordpress.org/download/releases/)

3. Unpack that zip archive into www/wp/

4. Open http://localhost:5000/wp/ in browser, do installation process. 

5. Installation could not proceed automatically (most likely wp folder is mounted in docker in readonly mode). So I had to put generated config in wp-config.php and restart the server.

6. Proceed to successfully create a website.

7. Connect to database container to verify that wordpress is set up and didn't write to /dev/null or something.
```
docker compose exec database /bin/sh
```
```
# mysql --user=admin --password=admin
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 4
Server version: 10.6.28-MariaDB-ubu2204 mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> use "wp1"
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
MariaDB [wp1]> show tables;
+------------------------+
| Tables_in_wp1          |
+------------------------+
| wp1_commentmeta        |
| wp1_comments           |
| wp1_links              |
| wp1_options            |
| wp1_postmeta           |
| wp1_posts              |
| wp1_term_relationships |
| wp1_term_taxonomy      |
| wp1_termmeta           |
| wp1_terms              |
| wp1_usermeta           |
| wp1_users              |
+------------------------+
12 rows in set (0.001 sec)

MariaDB [wp1]> select * from wp1_users;
+----+------------+-----------------------------------------------------------------+---------------+-----------------+--------------------------+---------------------+---------------------+-------------+--------------+
| ID | user_login | user_pass                                                       | user_nicename | user_email      | user_url                 | user_registered     | user_activation_key | user_status | display_name |
+----+------------+-----------------------------------------------------------------+---------------+-----------------+--------------------------+---------------------+---------------------+-------------+--------------+
|  1 | admin      | $wp$2y$12$N/rVfD723ocMvbj7RKueBuM5i./KrbOvRUtAxsCcYZfiGMC9Mz/U2 | admin         | admin@admin.com | http://localhost:5000/wp | 2026-09-09 18:19:25 |                     |           0 | admin        |
+----+------------+-----------------------------------------------------------------+---------------+-----------------+--------------------------+---------------------+---------------------+-------------+--------------+
1 row in set (0.008 sec)

MariaDB [wp1]> 

```

8. Actually, putting wp-config.php in repository is not safe, so I created wp-config.sample.php with placeholder values, and added wp-config.php to .gitignore.
