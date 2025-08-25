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
    -- cascade
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

-- sub query
*/

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