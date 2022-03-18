<h3 align="center">JAE-ShortURL</h3>

## About JAE-ShortUR

JAE-ShortUR is a code challenge project for JND WEB Co., Ltd., created by Udornpit Saengdee from 2022/03/15 to 2022/03/18.

## Installation Guide

- Import jaeshorturl.sql to MySQL database or use migration.
- If using migration. Create new migration to add user_id column to short_urls table or just edit the file database\migrations\2019_12_22_015115_create_short_urls_table.php
- Edit ashallendesign vendor class of Builder.php to modify the configurations such as Shorten URL route, etc.
- Edit ashallendesign vendor model of ShortURL.php to allow user_id insert into short_urls table.

For more details or any problems on installing, please feel free to contact me.

## Architechture Design


## License

The JAE-ShortURL project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
