create schema petshop;
use petshop;

create table branch
	(
    branch_code int not null,
    branch_name varchar(30) not null,
    primary key (branch_code)
	);
    
create table product
	(
	product_id int not null auto_increment ,
    name varchar(20) not null,
    information varchar(250) not null,
    type_product varchar(20),
    branch_code int not null ,
    price int not null,
    amount int not null,
    image varchar(20) not null,
    primary key (product_id),
    foreign key (branch_code) references branch(branch_code) /* เอา primary key มาจาก branch (ดึงมา)*/
	);

create table admin (
	admin_id int not null auto_increment ,
    username varchar(30) not null,
    password varchar(30) not null,
    branch_code int not null,
    primary key(admin_id),
    foreign key (branch_code) references branch(branch_code)
);



create table service(
	service_id int not null auto_increment,
    service_name varchar(20) not null,
    service_detail varchar(250) not null,
    service_price int not null,
    branch_code int not null,
    primary key(service_id),
	foreign key (branch_code) references branch(branch_code)
);


insert into branch values(1,"Bang Mod");
insert into branch values(2,"Bang Na");
insert into branch values(3,"Bang Bo");


insert into admin values (1, 'BangMod', 'BangMod',1);
insert into admin values (2, 'BangNa', 'BangNa',2);
insert into admin values (3, 'BangBo', 'BangBo',3);


select * from product;
select * from service;


drop schema petshop;



