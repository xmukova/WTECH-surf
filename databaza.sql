CREATE TABLE Users (
	id SERIAL PRIMARY KEY,
	name VARCHAR(100),
	surname VARCHAR(100),
	email VARCHAR(100) UNIQUE,
	password VARCHAR(255),
	country VARCHAR(30),
	is_admin BOOL,
	phone_number VARCHAR(15),
	created_at TIMESTAMP,
	updated_at TIMESTAMP
);

CREATE TABLE Categories (
	id SERIAL PRIMARY KEY,
	name VARCHAR(100)
);

CREATE TABLE Products (
	id SERIAL PRIMARY KEY,
	name VARCHAR(100),
	description TEXT,
	price DECIMAL(10, 2),
	category_id INT REFERENCES Categories(id),
	color VARCHAR,
	size VARCHAR,
	stock INT,
	popularity_score,
	add_at TIMESTAMP,
	updated_at TIMESTAMP
);

CREATE TABLE Orders (
	id SERIAL PRIMARY KEY,
	user_id INT REFERENCES Users(id),
	order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	total_price DECIMAL(10, 2),
	status VARCHAR,
	payment_id INT REFERENCES Payment(id),
	shipping_id INT REFERENCES Shipping(id)
);

CREATE TABLE Order_Items (
	id SERIAL PRIMARY KEY,
	order_id INT REFERENCES Orders(id),
	product_id INT REFERENCES Products(id),
	quantity INT,
	size INT
);

CREATE TABLE Payment(
	id SERIAL PRIMARY KEY,
	method VARCHAR(50),  
	payment_date TIMESTAMP,
	status VARCHAR(50) 
);

CREATE TABLE Shipping(
	id SERIAL PRIMARY KEY,
	method VARCHAR(50), 
	shipping_date TIMESTAMP,
	tracking_number VARCHAR(100),
	status VARCHAR(50)
	address VARCHAR(50)
);

CREATE TABLE Images(
	id SERIAL PRIMARY KEY,
	product_id INT REFERENCES Products(id),
	image_url TEXT,
	alt_text VARCHAR(255)
);

CREATE TABLE Cart_Items(
	id SERIAL PRIMARY KEY,
	user_id INT REFERENCES Users(id),
	product_id INT REFERENCES Products(id),
	quantity INT,
	size VARCHAR(50),
	added_at TIMESTAMP
);

CREATE TABLE Favorites(
	id SERIAL PRIMARY KEY,
	user_id INT REFERENCES Users(id),
	product_id INT REFERENCES Products(id),
	added_at TIMESTAMP
);

CREATE TABLE Search_History(
	id SERIAL PRIMARY KEY,
	user_id INT REFERENCES Users(id),
	search_query TEXT,
	search_date TIMESTAMP
);

