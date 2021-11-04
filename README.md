This is a system for searching products.It has admin panel and public panel,also there are two types of roles ,admin and user.Only the admin is able to create new Users ,and both are eble to do crud operations on the products.The products are linked with categories.
When searching the public user have to be able to search with : 
1 - Scenario => Category and Product Name :
1 - Scenario => Only Category  :
1 - Scenario => Only Product Name :
4 - Scenario => Recently added Products :
The admin is able to make CRUD on Users.

Dependencies which im are using bootstrap for the front-end , fortify laravel for registration, intervention for image resizing .
Also I'm  setting 2 roles and adding gate permissions.There are seeds to populate the DB records .
This is the description of DB Schema:




Table Users    Table Role_User  Table Roles
UserID         UserID            ID
               RoleID    


Products are linked with the categories and the categories are linked with user ID . On delete cascade.

