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

