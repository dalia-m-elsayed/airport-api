Backend Developer Programming Test
Important Notes:
- Use Yii2 Application to start the project.
	-> done
- Airport database structure like : [ id, airport_code, airport_name, country, city ]
	-> I used the airport_code as the id, as it is a unique value
- Basic HTTP authentication with 3 user roles ( Admin, User, Guest )
	-> done
- Application should be able to return XML or JSON response depends on headers  sent ( application/json, application/xml )
-> Yii2 supports  response format negotiation (supporting JSON and XML by default)
- RESTful routes should be case insensitive ex ( /api/searchAirport ) should be the same as ( /api/searchairport )
	-> Previously in Yii 1 this could be done using yii\web\UrlManager::caseSensitive",
but in Yii2 it was dropped because case insensitive URLs are not SEO friendly.
- Send your application along with composer.json WITHOUT vendor directory.
	-> done
- Include a brief description about your application and how its working and the packages you used.
-> done
- If you have Github profile please send it with the application.
	-> https://github.com/dalia-m-elsayed , but haven’t been used for a while



Brief description about the application
	The application is base on Yii2 advanced template, composer is used to install it.
	Airport RESTful api is developed under “api” module folder.
	Api folder hierarchy is as follow:

api
-- common
------ controllers
------ models
-- config
-- modules
------ v1
---------- controllers
---------- models
-- runtime
-- tests
-- web

	Database:
- Structure:
“airport” : [airport_code – airport_name – country - city]
“user” : (Yii migrate command is used to generate this table, and then added role field to define user roles for authorization, and access_token field to save access token for authentication)
“migration” : (auto generate by yii migrate command)
- airport table is populated with a complete list if all airports worldwide
- db configurations are defined in /common/config/main-local.php

	Restful API (CRUD and search with airport_code):
- AirportController extends ActiveController class and by that we have all the main RESTfull CRUD and search actions implemented, with both json and xml formats supported according to headers.
- In Airport Model, primaryKey() is redefined because integer auto increment in not used as primary key, airport_code is used instead.
-  Rules for the airport table CRUD operations are defined.

	Authentication:
- AirportController authenticator behavior is configured to use HttpBasicAuth, and IfindIdentityByAccessToken() is implemented in the User Model.
- access_token is saved in “user” table.

	Authorization:
- In the AirportController, yii\rest\Controller::checkAccess() is overridden to perform authorization check, based on the required three user roles (Admin, User and Guest).

	To run the application:
1- run composer install to fetch all required dependencies.
2- import api.sql 
3- update /common/config/main-local.php according to your db credentials
4- test the api endpoints through any restful client, these are the supported endpoints:
•	GET /airport/api/web/v1/airports: list all airports
•	POST /airport/api/web/v1/airports: create a new airport
•	PUT /airport/api/web/v1/airports/dxb: update the airport dxb
•	DELETE /airport/api/web/v1/airports/dxb: delete the airport dxb 
•	GET /airport/api/web/v1/airports/dxb: return the details of the airport dxb
5- Authentication and authorization:
  - as we are using http basic auth, so access_tokens are used as usernames, and password is left empty.
•	Admin, has full access: tok-admin
•	User, has access for (index, view, create, update): tok-user
•	Guest, has access for (index, view): tok-guest

That’s it 


   
