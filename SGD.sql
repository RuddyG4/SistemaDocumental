CREATE TABLE customers (
    id SERIAL PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    company_name VARCHAR(60) NOT NULL
);

CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    role_name VARCHAR(60) NOT NULL UNIQUE,
	tenan_id INT NOT NULL REFERENCES customers (id)
);

CREATE TABLE permissions (
	id SERIAL PRIMARY KEY,
	name VARCHAR(60) NOT NULL UNIQUE,
	description VARCHAR(60) NOT NULL,
	tenan_id INT NOT NULL REFERENCES customers (id)
);

CREATE TABLE permission_role (
	role_id INT REFERENCES roles (id),
	permission_id INT REFERENCES permissions (id),
	PRIMARY KEY (role_id, permission_id)
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    role_id INT NOT NULL REFERENCES roles (id),
    username VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    tenan_id INT NOT NULL REFERENCES customers (id)
);

CREATE TABLE folders (
    id SERIAL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES users (id),
    folder_name VARCHAR(60) NOT NULL,
    description VARCHAR(255) NOT NULL,
	parent_id INT REFERENCES folders (id),
    tenan_id INT NOT NULL REFERENCES customers (id),
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE categories (
	id SERIAL PRIMARY KEY,
	category_name VARCHAR(60) NOT NULL,
	description VARCHAR(60) NOT NULL,
	tenan_id INT NOT NULL REFERENCES customers (id)
);

CREATE TABLE files (
	id SERIAL PRIMARY KEY,
	file_name VARCHAR(60) NOT NULL,
	file_path VARCHAR(255) NOT NULL,
	folder_id INT REFERENCES folders (id),
	category_id INT REFERENCES categories (id),
	tenan_id INT NOT NULL REFERENCES customers (id),
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE version_history (
	id SERIAL PRIMARY KEY,
	version_date date NOT NULL,
	Path VARCHAR(255) NOT NULL,
	user_id INT NOT NULL,
	name_user VARCHAR(60) NOT NULL,
	file_id INT REFERENCES files (id),
	tenan_id INT NOT NULL REFERENCES customers (id)
);

CREATE TABLE subscription (
	id SERIAL PRIMARY KEY,
	name VARCHAR(60) NOT NULL,
	price decimal(12,2) NOT NULL,
	duration INT NOT NULL
);

CREATE TABLE custommers_subscription (
	id SERIAL PRIMARY KEY,
	subscription_date date NOT NULL,
	subscription_id INT REFERENCES subscription (id),
	custommers_id INT REFERENCES customers (id)
);


-- Data population

-- customers
insert into customers(name, email, password, company_name) values 
('Gonzalo', 'ruddygonzqh@gmail.com', '$2y$10$HdN5uqitH0qRbYppWR3eaeY8BBff3akK9e92U1FbYY.FV0vQHgVUa', 'Clinica Montalvo');

-- roles
insert into roles (role_name, tenan_id) values
('Administrator', 1);

-- permissions
insert into permissions (name, description, tenan_id) values
('documents.lists', 'description', 1);

insert into permission_role (role_id, permission_id) values
(1, 1);

-- Users
insert into users (role_id, username, email, password, tenan_id) values
(1, 'gonzalo', 'ruddygonzqh@gmail.com', '$2y$10$HdN5uqitH0qRbYppWR3eaeY8BBff3akK9e92U1FbYY.FV0vQHgVUa', 1);

-- folders

-- First level folders
insert into folders (user_id, folder_name, description, tenan_id, created_at) values
(1, 'Imagenes', 'imagenes de la compañia', 1, CURRENT_TIMESTAMP),
(1, 'Historias clinicas', 'Historias clinicas de los pacientes', 1, CURRENT_TIMESTAMP),
(1, 'Personal', 'Documentos del personal de recursos humanos', 1, CURRENT_TIMESTAMP);