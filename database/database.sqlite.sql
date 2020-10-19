BEGIN TRANSACTION;
CREATE TABLE IF NOT EXISTS "products" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"categories_id"	integer NOT NULL,
	"p_name"	varchar,
	"p_code"	varchar,
	"description"	text NOT NULL,
	"price"	float NOT NULL,
	"image"	varchar NOT NULL,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "carts" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "product_attribs" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "orders" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "product__categories" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"parent_id"	integer,
	"name"	varchar NOT NULL,
	"description"	text,
	"url"	varchar NOT NULL,
	"status"	integer NOT NULL DEFAULT '0',
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime
);
CREATE TABLE IF NOT EXISTS "password_resets" (
	"email"	varchar NOT NULL,
	"token"	varchar NOT NULL,
	"created_at"	datetime
);
CREATE TABLE IF NOT EXISTS "users" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"name"	varchar NOT NULL,
	"email"	varchar NOT NULL,
	"email_verified_at"	datetime,
	"password"	varchar NOT NULL,
	"admin"	integer,
	"remember_token"	varchar,
	"created_at"	datetime,
	"updated_at"	datetime,
	"org-of-practice"	varchar,
	"profession"	varchar,
	"telephone"	varchar,
	"organization"	integer NOT NULL DEFAULT '0',
	"self"	integer NOT NULL DEFAULT '0',
	"card-number"	integer,
	"security-code"	integer,
	"expiry-date-month"	integer,
	"expiry-date-year"	integer,
	"mpesa-number"	integer,
	"ref-id"	integer,
	"user-type"	varchar NOT NULL
);
CREATE TABLE IF NOT EXISTS "migrations" (
	"id"	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
	"migration"	varchar NOT NULL,
	"batch"	integer NOT NULL
);
INSERT INTO "products" ("id","categories_id","p_name","p_code","description","price","image","created_at","updated_at") VALUES (1,2,'hepatitis B','HPT_B','Hepatitis B virus (HBV) vaccine response is good in individuals with HIV and therefore should be given to aid in prevention of HBV, to reduce costs of treatment, and to help prevent HBV/HIV coinfection, according to a retrospective, descriptive study published in the Annals of Hepatology.1

HBV and HIV share the same route of transmission, mainly sexual and parenteral, which assists in the occurrence of HBV/HIV coinfection.2 Coinfection accelerates the course of liver disease,3,4 and the risk for progression to AIDS or death is almost double for those with HBV/HIV coinfection',23.0,'1600257501-hepatitis-b.jpg','2020-09-16 11:58:22','2020-09-16 11:58:22');
INSERT INTO "product__categories" ("id","parent_id","name","description","url","status","remember_token","created_at","updated_at") VALUES (1,0,'medice','medice','http://#',1,NULL,'2020-09-16 10:50:09','2020-09-16 10:50:09'),
 (2,0,'Vaccines','Vaccines','http://Vaccines',1,NULL,'2020-09-16 11:06:23','2020-09-16 11:06:23');
INSERT INTO "migrations" ("id","migration","batch") VALUES (1,'2014_10_12_000000_create_users_table',1),
 (2,'2014_10_12_100000_create_password_resets_table',1),
 (3,'2020_09_14_225114_create_products_table',1),
 (4,'2020_09_14_230353_create_product__categories_table',1),
 (5,'2020_09_14_230526_create_orders_table',1),
 (6,'2020_09_14_230652_create_product_attribs_table',1),
 (7,'2020_09_14_230719_create_carts_table',1);
CREATE UNIQUE INDEX IF NOT EXISTS "slug" ON "product__categories" (
	"name"
);
CREATE INDEX IF NOT EXISTS "password_resets_email_index" ON "password_resets" (
	"email"
);
CREATE UNIQUE INDEX IF NOT EXISTS "users_email_unique" ON "users" (
	"email"
);
COMMIT;
