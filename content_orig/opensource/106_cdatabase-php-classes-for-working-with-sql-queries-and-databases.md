---
author: mos
category: php
updated: "2014-04-17 09:46:42"
created: "2014-04-17 00:27:13"
...
CDatabase - PHP classes för working with SQL queries and databases
==================================

The `CDatabase` is a collection of PHP classes that aid in working and querying databases. It has a *query builder* that let you build the SQL queries using code, in a database agnostic way and it has a *database abstraction layer* on top of PHP PDO which adds logging, debugging and ease of use.   

This is basically an addon upon PHP PDO. It is small enough to understand and easy enough to extend by a intermediate skilled PHP programmer. It can be used as a base to build upon to create your own custom database library, before moving on to a more complete ORM library (Object Relational Mapping).

<!--more-->



License {#license}
--------------------------------------

`CDatabase` is free software and open source software, licensed according MIT.



Requirements {#reqs}
--------------------------------------

`CDatabase` requires PHP 5.4. 



Installation {#install}
--------------------------------------

The current version is tagged as v0.1.0 and release 2014-04-17.

It is not a completely stable version and there might be changes in the API in coming releases. This software is still under development.



###Clone it from GitHub {#clone}

The [sourcode is available on GitHub](https://github.com/mosbth/cdatabase). Clone, fork or [download as zip](https://github.com/mosbth/cdatabase/archive/master.zip). 

```bash
git clone https://github.com/mosbth/cdatabase.git
```

You can use the latest and most updated version. It *should* work. You can also switch to a more tested version, like this. First check which tags are available and then checkout one of those. But start with the latest and most updated version that comes per default.

```bash
git tag
git checkout v0.1.0
```



###Install using composer {#composer}

The package is available at Packagist as [`mos/cdatabase`](https://packagist.org/packages/mos/cdatabase). You can install the package using composer. Add the following to your `composer.json`.

`composer.json`

```javascript
{
    "require": { 
        "mos/cdatabase": "dev-master"
    }
}
```

You can then install the package `mos/cdatabase` using the following command.

```bash
composer validate
composer install --no-dev
```

The package is now available in you `vendor` map.



###Verify installation {#verify}

Point your web browser to the installation directory and the directory `webroot`. Then choose the test file `testSQLQueryBuilderBasic.php`. It should print out a lot of SQL commands, something like this.

```text
CREATE TABLE mos_test
(
    id integer primary key not null,
    age integer,
    text varchar(20),
    text2 varchar(20)
);

INSERT INTO mos_test
    (id, text, text2)
    VALUES
    (2, 'Mumintrollet', 'Mumindalen');
```

And so on. It works -- if all you see is wonderful SQL statements.



Basic usage {#usage}
--------------------------------------



###Classes and an use case {#classes}

`CDatabase` consists of two parts. First the database abstraction layer which is implemented in the class `Mos\Database\CDatabaseBasic`. Second is the trait `Mos\Database\TSQLQueryBuilderBasic` which is used by `CDatabase`. So, it means that all features are collected in the class `CDatabase`, or `CDatabaseBasic` that is.

`Basic` is appended since this is still a development project, it will be stripped once a more stable version, with more features, is reached.



###Connect to MySQL or SQLite {#connect}

The classes are tested on a limited set of the features for the database SQLite and MySQL. You should create a config-file with the connection details. The directory `webroot` contains two examples.

**Connection details for SQLite in `webroot/config_sqlite.php`.**

```php
return [
    'dsn'     => "sqlite:.htsqlite.db",
    'verbose' => true,
];
```

**Connection details for MySQL.**

```php
return [
    'dsn'     => "mysql:host=localhost;dbname=test;",
    'username'        => "test",
    'password'        => "test",
    'driver_options'  => null,
    'driver_options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    'verbose' => true,
    //'debug_connect' => true,
];
```

The config item `verbose` is useful for development, it prints out all the requests to the database.

The config item `debug_connect` is useful for development when failing to connect to the database. It throws an exception with *secret* connection details such as user and password. So use it only when no other sees it.

We use these config files to create a database object and connect it with the database.

**Connect to a database**

```php
$db = new \Mos\Database\CDatabaseBasic();
$options = require "config_sqlite.php";
$db->setOptions($options);
$db->connect();
```

As you can see, you only need to change the config file, to connect to your MySQL database instead.



###Verbose mode {#verbose}

As I said above, the config item `verbose` is useful for development, it prints out all the requests to the database. This can also be set to on and off whenever needed.

**Use verbose mode**

```php
$db->setVerbose();      // Set verbose mode to on
$db->setVerbose(true);  // Set verbose mode to on
$db->setVerbose(false); // Set verbose mode to off
```

When using `verbose` mode the queries are displayed with their resulting SQL-code and parameters. Like this.

```text
Num query = 1

Query =

INSERT INTO test
    (age, text)
    VALUES
    (?, ?);

Params:

Array
(
    [0] => 22
    [1] => Mumintrollet
)
```

This provides a quick way to visually inspect the query and its parameters. Its good for troubleshooting.



Query the database {#queries}
--------------------------------------

There are several ways to query the database. You can construct the SQL queries using plain old SQL. Or, you can use the query builder. 

Lets go through the different steps of creating and executing queries.



###Table prefix {#prefix}

Sometimes you need to have many databases in one database and that can be solved using namespacing the table names. This can be done using a table prefix that is global for all table names.

```php
$db->setTablePrefix('mos_');
```



###DROP TABLE {#drop-table}

This is how to drop a table.

```php
$sql = "DROP TABLE mos_test;";
$db->execute($sql);

$sql = "DROP TABLE IF EXISTS mos_test;";
$db->execute($sql);

$db->dropTableIfExists('test')
   ->execute();

$db->dropTable('test')
   ->execute();
```

The table prefix is added when creating the queries using the query builder. But, you need to add it manually when you create the SQL queries by hand.



###CREATE TABLE {#create-table}

This is how to create a table.

```php
$sql = "
CREATE TABLE mos_test
(
    id integer primary key not null,
    age integer,
    text varchar(20)
)
;";
$db->execute($sql);

$db->createTable(
    'test',
    [
        'id'    => ['integer', 'auto_increment', 'primary key', 'not null'],
        'age'   => ['integer'],
        'text'  => ['varchar(20)'],
    ]
);

$db->execute();
```

SQLite and MySQL behaves differently using the attribute `auto_increment`. It is used by MySQL but removed in SQLite. It is these small changes between database engines that can be handled in a more database agnostic way by using the query builder who are aware of these small differences and takes action to manage them.



###INSERT {#insert}

This is how to insert rows into a table.

```php
$sql = "
INSERT INTO mos_test
    (age, text)
    VALUES
    (22, 'Mumintrollet');
;";
$db->execute($sql);

$sql = "
INSERT INTO mos_test
    (age, text)
    VALUES
    (?, ?);
;";
$db->execute($sql, [22, 'Mumintrollet']);

$db->insert(
    'test',
    [
        'id' => 2,
        'text' => "Mumintrollet",
    ]
);
$db->execute();

$db->insert(
    'test',
    ['id', 'text'],
    [2, "Mumintrollet"]
);
$db->execute();

$db->insert(
    'test',
    ['id', 'text']
);
$db->execute([22, 'Mumintrollet']);
```

You can see the flexibility on how to create the SQL query. All queries results in the same SQL statement being processed.



###UPDATE {#update}

This is how to update rows into a table.

```php
$sql = "
UPDATE mos_test
SET
    age = 44,
    text = 'Mumindalen'
WHERE id = 2
;";
$db->execute($sql);

$sql = "
UPDATE mos_test
SET
    age = ?,
    text = ?
WHERE id = ?
;";
$db->execute($sql, [44, 'Mumindalen', 2]);

$db->update(
    'test',
    [
        'age' => 44,
        'text' => "Mumindalen",
    ],
    "id = 2"
);
$db->execute();

$db->update(
    'test',
    ['age', 'text'],
    [44, "Mumindalen"],
    "id = 2"
);
$db->execute();

$db->update(
    'test',
    ['age', 'text'],
    "id = ?"
);
$db->execute([44, 'Mumindalen', 2]);
```

The update statement has the same flexibility as the insert statement in how it is created.



###DELETE {#delete}

This is how to delete rows in a table.

```php
$sql = "DELETE FROM mos_test WHERE id = 2;";
$db->execute($sql);

$sql = "DELETE FROM mos_test;";
$db->execute($sql);

$db->delete(
    'test',
    "id = 2"
);
$db->execute();

$db->delete(
    'test',
    "id = ?"
);
$db->execute([2]);

$db->delete(
    'test'
);
$db->execute();
```

Be sure to add the where-part to avoid accidentally deleting all rows in the table.




###SELECT {#select}

This is how to select rows and columns in a table.

```php
$sql = "
SELECT
    age, text
FROM mos_test
WHERE 
    id = 2
;";
$db->execute($sql);

$sql = "
SELECT
    age, text
FROM mos_test
WHERE 
    id = ?
;";
$db->execute($sql, [2]);

$db->select("age, text, text1")
    ->from('test')
    ->where("id = 2")
;
$db->execute();

$db->select("age, text, text1")
    ->from('test')
    ->where("id = ?")
;
$db->execute([2]);
```

This is how to select all rows and columns in a table and sort them.

```php
$sql = "
SELECT
    *
FROM mos_test
ORDER BY id ASC
;";
$db->execute($sql);

$db->select()
    ->from('test')
    ->orderBy("id ASC")
;
$db->execute();
```

This is how to select and join tables.

```php
$sql = "
SELECT
    t1.*, t2.id AS id2, t3.id AS id3
FROM mos_test AS t1
INNER JOIN mos_test AS t2
    ON t1.id = t2.id
INNER JOIN mos_test AS t3
    ON t1.id = t3.id
;";
$db->execute($sql);

$db->select("t1.*, t2.id AS id2, t3.id AS id3")
    ->from('test AS t1')
    ->join('test AS t2', 't1.id = t2.id')
    ->join('test AS t3', 't1.id = t3.id');

$db->execute();
```

As you see, it is possible to create more and more advanced queries using the query builder.

Check the source code to see what options are available and you will notice that it is not to hard to add your own constructs, whenever needed.



Test programs for each database {#test-db}
--------------------------------------

In the directory `webroot` there exists one test program for each database, `testSQLite.php` for SQLite and `testMySQL.php` for MySQL.



###Test SQLite {#test-sqlite}

This test is dependent on the following files.

* `testDatabaseQueries.php`
* `config_sqlite.php`
* `testSQLite.php`

Review the files and run the test by pointing your browser to `testSQLite.php`.

You need to make the directory writable by the web server, so it can create the database file.


###Test MySQL {#test-mysql}

This test is dependent on the following files.

* `testDatabaseQueries.php`
* `config_mysql.php`
* `testMySQL.php`

Review the files and run the test by pointing your browser to `testMySQL.php`.

You need to set up the connection details to your own database.



###Get going on your own {#test-own}

The test programs gives you a base to start from. Continue by building your own test program and try it out. Does it work the way you though it should? Are any constructs missing?

There is not to much effort needed to add items to the CDatabase API. Put an issue on GitHub if you are uncertain on the right way to do it. Create a pull request if you did something nice. 



A sample installation {#installation}
--------------------------------------

You can see the [sample installation here](http://www.student.bth.se/~mosstud/kod-exempel/cdatabase/), and try out the example programs in `webroot`.



Trouble and feature requests {#tr}
--------------------------------------

Use [GitHub to report issues](https://github.com/mosbth/cdatabase/issues). Always include the following.

1. Describe very shortly: What are you trying to achieve, what happens, what did you expect.
2. Make a test case with a minimal structure of the behavior and explain how to reproduce it.

If you request a feature, describe its usage and argument for why it fits into `CDatabase`.

Feel free to fork, clone and create pull requests.



Revision {#revision}
--------------------------------------

<span class='revision-history' markdown='1'>
2014-04-17 (A, mos) First release on dbwebb/opensource as part of course material for phpmvc-course.  
</span>
