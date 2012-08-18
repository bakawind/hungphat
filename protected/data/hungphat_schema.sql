create table categories{
    id int primary key,
    name varchar(128)
};

create table products {
    id int primary key,
    code varchar(64) unique not null,
    name varchar(128) not null,
    price double not null default 0,
    description varchar(max),
    image varchar(128),
    modified_date datetime,
    category_id int foreign key references categories(id)
}

create table product_photos {
    id int primary key,
    url varchar(128) not null,
    product_id int foreign key references products(id)
}

create table article {
    id int primary key,
    title varchar(128),
    content varchar(max) not null
}

create table orders {
    id int primary key,
    name varchar(128) not null,
    email varchar(128),
    address varchar(256) not null,
    phone varchar(16) not null,
    status int not null default 0,
    total double not null,
}

create table order_items {
    id int primary key,
    product_id int foreign key references products(id) not null,
    quntity int not null,
    order_id int foreign key references orders(id) not null
}
