create table categories(
    id int primary key AUTO_INCREMENT,
    name varchar(128),
    caption varchar(128),
    image varchar(256)
);

create table products (
    id int primary key AUTO_INCREMENT,
    code varchar(64) unique not null,
    name varchar(128) not null,
    price double not null default 0,
    description text,
    image varchar(256),
    modified_date datetime,
    category_id int,
    available boolean DEFAULT 1,
    foreign key (category_id) references categories(id)
);

create table product_photos (
    id int primary key AUTO_INCREMENT,
    url varchar(256) not null,
    product_id int,
    foreign key (product_id) references products(id)
);

create table article (
    id int primary key AUTO_INCREMENT,
    title varchar(128),
    content text not null,
    image varchar(256),
    modified_date datetime
);

create table orders (
    id int primary key AUTO_INCREMENT,
    name varchar(128) not null,
    email varchar(128),
    address varchar(256) not null,
    phone varchar(16) not null,
    status int not null default 0,
    total double not null,
    created_date datetime
);

create table order_items (
    id int primary key AUTO_INCREMENT,
    quantity int not null,
    product_id int not null,
    foreign key (product_id) references products(id),
    order_id int not null,
    foreign key (order_id) references orders(id)
);

-- alter tables, update id comlumns to auto_increment
ALTER TABLE article MODIFY COLUMN id int AUTO_INCREMENT;
ALTER TABLE categories MODIFY COLUMN id int AUTO_INCREMENT;
ALTER TABLE orders MODIFY COLUMN id int AUTO_INCREMENT;
ALTER TABLE product_photos MODIFY COLUMN id int AUTO_INCREMENT;
ALTER TABLE products MODIFY COLUMN id int AUTO_INCREMENT;
ALTER TABLE order_items MODIFY COLUMN id int AUTO_INCREMENT;

SHOW COLUMNS FROM order_items FROM hungphat;
INSERT INTO article(title, content) VALUES('example','example_content');
