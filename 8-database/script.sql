-- create database
create database "ASSET_AMANAGEMENT";
-- drop database
drop database if exists "ASSET_AMANAGEMENT";
-- rename database
alter database asset_amanagement rename to "ASSET_AMANAGEMENT";
-- create table
-- serial = int auto increment
create table users (
    id SERIAL primary key,
    name varchar(50) not null,
    email varchar(50) not null unique,
    gender char(1) not null,
    password varchar(100) not null
);

create table "Assets" (
    id SERIAL primary key,
    name varchar(50) not null,
    value bigint not null,
    location_id int not null references "Locations" (id) on delete restrict on update restrict
    -- restrict
    -- no action
    -- set null
    -- set default
);

drop table if exists "Assets";

alter table "Assets"
add column category_id int not null references "Categories" (id);

create table "Locations" (
    id SERIAL primary key,
    name varchar(50) not null
);

create table "Categories" (
    id SERIAL primary key,
    name varchar(50) not null
);
-- drop table
drop table users;
-- rename
alter table users rename to "Users";
-- add column
alter table "Users" add column "phoneNumber" varchar(20);
-- remove column
alter table "Users" drop column "phoneNumber";
-- rename column
alter table "Users" rename column name to fullname;
-- change column
alter table "Users" alter column fullname type varchar(100);

-- CRUD
-- create : insert data
insert into "Categories" ("name") values ('Tanah');

insert into "Categories" values (default, 'Bangunan');

insert into "Categories" values (default, 'Tanah dan Bangunan');

insert into
    "Locations" (name)
values ('Bandung'),
    ('Bogor'),
    ('Bekasi')
returning
    *;

insert into
    "Assets" (
        name,
        value,
        location_id,
        category_id
    )
values (
        'Gedung Sate',
        60000000000,
        1,
        3
    ),
    (
        'Gedung Soto',
        6000000000,
        2,
        2
    )
returning
    name,
    value;

insert into
    "Assets" (
        name,
        value,
        location_id,
        category_id
    )
values (
        'Gedung BPKAD',
        60000000000,
        1,
        2
    ),
    (
        'Gedung Seblak',
        5000000000,
        2,
        3
    )
returning
    name,
    value;

-- READ : select
select * from "Assets";

select id, name from "Assets";

select id AS "ID", name AS "Nama Asset" from "Assets";

select * from "Locations";

-- UPDATE
update "Assets"
set
    value = 60000000000,
    category_id = 3
where
    id = 1
returning
    *;

-- DELETE
delete from "Assets" where id = 5 returning *;

delete from "Locations" where id = 2;

-- truncate
truncate table "Assets" restart identity;

/*
select [...column]
from [table]
join [table] on [pk] = [fk]
where [...condition]
group by [...column]
having [...condition]
order by [...column] [asc|desc]
limit [n]
offset [n]

-- functions
- string
- number
- aggregate
- date

-- sub query
*/

select * from "Assets";

select name, value from "Assets";

select name as "Nama Asset", value as "Nilai Asset" from "Assets";

select DISTINCT (category_id) from "Assets";

-- join

select "Assets".*, "Categories".name as "Kategori", "Locations".name as "Lokasi"
from
    "Assets"
    join "Categories" on "Categories".id = "Assets".category_id
    join "Locations" on "Locations".id = "Assets".location_id;

-- table & column alias
select a.*, c.name as "Kategori", l.name as "Lokasi"
from
    "Assets" as a
    join "Categories" as c on c.id = a.category_id
    join "Locations" as l on l.id = a.location_id;

-- where

select * from "Assets" where id = 1;

select * from "Assets" where name = 'Gedung Sate';

-- AND
select a.*, c.name as "Kategori", l.name as "Lokasi"
from
    "Assets" as a
    join "Categories" as c on c.id = a.category_id
    join "Locations" as l on l.id = a.location_id
where
    c.name = 'Bangunan'
    and value > 10000000000;

-- <=
select * from "Assets" where value <= 50000000000;

-- OR
select a.*, c.name as "Kategori"
from "Assets" as a
    join "Categories" as c on c.id = a.category_id
where
    c.name = 'Bangunan'
    or c.name = 'Tanah';

select a.*, c.name as "Kategori"
from "Assets" as a
    join "Categories" as c on c.id = a.category_id
where
    c.name = 'Bangunan'
    or c.name = 'Tanah'
    or c.name = 'Perniagaan';

-- IN
select a.*, c.name as "Kategori"
from "Assets" as a
    join "Categories" as c on c.id = a.category_id
where
    c.name in (
        'Bangunan',
        'Tanah',
        'Perniagaan'
    );

-- between (inklusif)
-- number & date
select *
from "Assets"
where
    value between 1000000000 and 10000000000;

alter table "Assets" add column "last_update" date default now();

update "Assets" set last_update = '2025-01-01' where id <= 10;

update "Assets"
set
    last_update = '2024-05-21'
where
    id between 11 and 20;

update "Assets" set last_update = null where id >= 25;

-- between for date
select *
from "Assets"
where
    last_update between '2025-01-01' and '2025-12-31';

-- like & ilike
select * from "Assets" where name like '%Sate%';

select * from "Assets" where name ilike '%sate%';

select * from "Assets" where name ilike '_e%';

-- is null
select * from "Assets" where last_update is not null;

-- aggregate function
-- min, max, avg, count, sum
select min(value) from "Assets";

select max(value) from "Assets";

select avg(value) from "Assets";

select count(id) from "Assets";

select sum(value) from "Assets";

select
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from "Assets";

-- group by
select
    l.name as "Lokasi",
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from "Assets" a
    join "Locations" l on l.id = a.location_id
group by
    l.name;

select
    c.name as "Kategori",
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from "Assets" a
    join "Categories" c on c.id = a.category_id
group by
    c.name;

-- multile grouping
select
    l.name as "Lokasi",
    c.name as "Kategori",
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from
    "Assets" a
    join "Locations" l on l.id = a.location_id
    join "Categories" c on c.id = a.category_id
group by
    l.name,
    c.name;

-- having
select
    l.name as "Lokasi",
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from "Assets" a
    join "Locations" l on l.id = a.location_id
group by
    l.name
having
    avg(value) >= 50000000000;

-- implementasi yg salah dari group
select
    l.name as "Lokasi",
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from "Assets" a
    join "Locations" l on l.id = a.location_id
group by
    l.name
having
    l.name = 'Bandung';

-- yg benar
select
    l.name as "Lokasi",
    min(value) as "Min",
    max(value) as "Max",
    avg(value) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from "Assets" a
    join "Locations" l on l.id = a.location_id
where
    l.name = 'Bandung'
group by
    l.name;

-- string
select * from "Assets" order by name asc;
-- number
select * from "Assets" order by value desc;
-- date
select * from "Assets" order by last_update desc;

select * from "Assets" order by name asc, value desc;

-- multile order
select
    l.name as "Lokasi",
    c.name as "Kategori",
    min(value) as "Min",
    max(value) as "Max",
    round(avg(value)) as "Rata - Rata",
    count(a.id) as "Jumlah Asset",
    sum(value) as "Total Asset"
from
    "Assets" a
    join "Locations" l on l.id = a.location_id
    join "Categories" c on c.id = a.category_id
group by
    l.name,
    c.name
order by l.name, "Rata - Rata" desc;

-- limit
select * from "Assets" order by id asc limit 10;

-- offset
select * from "Assets" order by id asc offset 10;

-- pagination
select * from "Assets" order by id asc limit 10;
-- 1st page
select * from "Assets" order by id asc limit 10 offset 10;
-- 2nd page
select * from "Assets" order by id asc limit 10 offset 20;
-- 3rd page

-- sub query
select max(value) from "Assets";

select *
from "Assets"
where
    value = (
        select max(value)
        from "Assets"
    );

-- function
-- number
select round(10.45);
-- pembulatan normal
select ceil(10.45);

select floor(10.75);
-- pi
select pi();

select abs(-90);

select mod(10, 3);

SELECT 10 % 3;

select name, value, value * 0.95 as "Nilai tahun depan"
from "Assets";

-- string concatenation
select id || '-' || name from "Assets";

select concat(id, '-', name) from "Assets";

select concat(
        id, '-', replace(lower(name), ' ', '-')
    )
from "Assets";

select lower('INI TEXT');

select upper('ini text');

select replace('ini test aja', ' ', '-');

select concat_ws('-', 'saya', 'ga', 'pasti');

select now();
-- function
select current_timestamp;
-- getter

select date_part('century', now());

select date_part('decade', now());

select date_part('year', now());

select date_part('month', now());

select date_part('week', now());

select date_part('day', now());

select date_part('hour', now());

select date_part('minute', now());

select date_part('second', now());

select date_part('millisecond', now());

select date_part('microsecond', now());

select date_part('dow', now());

select date_part('quarter', now());

select * from "Assets" where date_part('quarter', last_update) = 2;

select date_trunc('century', now());

select date_trunc('decade', now());

select date_trunc('year', now());

select date_trunc('month', now());

select date_trunc('week', now());

select date_trunc('day', now());

select date_trunc('hour', now());

select date_trunc('minute', now());

select date_trunc('second', now());

select date_trunc('millisecond', now());

select date_trunc('microsecond', now());

select date_trunc('dow', now());

select date_trunc('quarter', now());