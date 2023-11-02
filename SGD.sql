CREATE TABLE customers (
    id SERIAL PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL UNIQUE,
    password VARCHAR(60) NOT NULL,
    company_name VARCHAR(60) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
);

CREATE TABLE roles (
    id SERIAL PRIMARY KEY,
    role_name VARCHAR(60) NOT NULL,
	description VARCHAR(255) NOT NULL,
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
    email_verified_at TIMESTAMP,
    password VARCHAR(60) NOT NULL,
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP,
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

CREATE TABLE password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
	created_at TIMESTAMP NOT NULL
);

CREATE TABLE categories (
	id SERIAL PRIMARY KEY,
	category_name VARCHAR(60) NOT NULL,
	description VARCHAR(60) NOT NULL,
	tenan_id INT NOT NULL REFERENCES customers (id)
);

/* CREATE TABLE files (
	id SERIAL PRIMARY KEY,
	file_name VARCHAR(60) NOT NULL,
	file_path VARCHAR(255) NOT NULL,
	folder_id INT REFERENCES folders (id),
	category_id INT REFERENCES categories (id),
	tenan_id INT NOT NULL REFERENCES customers (id),
	created_at TIMESTAMP NOT NULL,
	updated_at TIMESTAMP
); */

CREATE TABLE files (
  id SERIAL PRIMARY KEY,
  file_name VARCHAR(60) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  folder_id INT,
  category_id INT,
  tenan_id INT NOT NULL,
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP
);

/* CREATE TABLE version_history (
	id SERIAL PRIMARY KEY,
	version_date date NOT NULL,
	Path VARCHAR(255) NOT NULL,
	user_id INT NOT NULL,
	name_user VARCHAR(60) NOT NULL,
	file_id INT REFERENCES files (id),
	tenan_id INT NOT NULL REFERENCES customers (id)
); */
CREATE TABLE version_history (
  id SERIAL PRIMARY KEY,
  version_date DATE NOT NULL,
  path VARCHAR(255) NOT NULL,
  user_id INT NOT NULL,
  name_user VARCHAR(60) NOT NULL,
  file_id INT,
  tenan_id INT NOT NULL,
  version_anterior_id INT DEFAULT NULL,
  version INT DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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

CREATE TABLE personal_access_tokens (
    id INT PRIMARY KEY GENERATED ALWAYS AS IDENTITY,
    tokenable_type VARCHAR(255) NOT NULL,
    tokenable_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    abilities TEXT,
    last_used_at TIMESTAMPTZ,
    expires_at TIMESTAMPTZ,
    created_at TIMESTAMPTZ NOT NULL,
    updated_at TIMESTAMPTZ NOT NULL
);

-- Data population

-- customers
insert into customers(name, email, password, company_name, created_at, updated_at) values
('Gonzalo', 'ruddygonzqh@gmail.com', '$2y$10$HdN5uqitH0qRbYppWR3eaeY8BBff3akK9e92U1FbYY.FV0vQHgVUa', 'Clinica Montalvo', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- roles
insert into roles (role_name, description, tenan_id) values
('Administrator', 'Adminstrador con control total del sistema.', 1),
('Medico', 'Médico de la clínica', 1);

-- permissions
insert into permissions (name, description, tenan_id) values
('documents.lists', 'description', 1);

insert into permission_role (role_id, permission_id) values
(1, 1);

-- Users
insert into users (role_id, username, email, password, tenan_id, created_at, updated_at) values
(1, 'gonzalo', 'ruddygonzqh@gmail.com', '$2y$10$HdN5uqitH0qRbYppWR3eaeY8BBff3akK9e92U1FbYY.FV0vQHgVUa', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- folders

-- First level folders
insert into folders (user_id, folder_name, description, tenan_id, created_at, updated_at) values
(1, 'Imagenes', 'imagenes de la compañia', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(1, 'Historias clinicas', 'Historias clinicas de los pacientes', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(1, 'Personal', 'Documentos del personal de recursos humanos', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
