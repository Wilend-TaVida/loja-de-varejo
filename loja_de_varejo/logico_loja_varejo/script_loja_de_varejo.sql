create database if not exists loja_de_varejo;
use loja_de_varejo;
create table if not exists address(
	id_address int primary key auto_increment,
    public_place varchar(50) not null,
    number_street varchar(5) not null,
    complement varchar(20),
    neighborhood varchar(50),
    city varchar(45),
    zip_code varchar(8)
);
create table if not exists providers(
	cnpj varchar(14) primary key,
    address_id int,
    provider_name varchar(45) not null,
    phone varchar(20) unique,
    constraint fk_address foreign key (address_id) references address(id_address)
);
create table if not exists products(
	id_products int primary key auto_increment,
    products_name varchar(50) not null,
    quantity int unsigned not null
);
create table if not exists providers_products(
	providers_cnpj varchar(14),
    products_id int,
    primary key(providers_cnpj, products_id),
    constraint fk_providers_cnpj foreign key (providers_cnpj) references providers(cnpj),
    constraint fk_products_id foreign key (products_id) references products(id_products)
);