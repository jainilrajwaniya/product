<p align="center"><a href="#" target="_blank">Hola!</a></p>


## About Product Setup

- Take clone from git hub repo
- In root folder, execute "composer install"
- Create Database and update the variables in .evn file
- Run "php artisan migrate" to make DB tables structure
- Execute "php artisan upload-products" manually so that you can populate the DB tables
- You can now start calling apis, given in "routes/api.php".


Below are the response of all the given requirements one by one:-

## 1. Scheduled Data Fetching: Set up Laravel task scheduler for data fetching every 2 hours.

We can see this file, UploadProducts.php, in console/command folder and configured in kernel.php to execute in every 2 hours. You can execute this command manually as well using command "php artisan upload-products". Executing this file will populate DB tables with new products or update the existing ones, if any.

## 2. API Pagination: Fetch 10 products per request, covering the first 3 pages.

In GET "/product/list" api we have used "paginate()" method that will return us the products in chunks. We can choose the number of product to be returned in one page using paginate method. 

### 3. Database Storage: Use MySQL to store product details (ID, name, description, price, etc.).

We are storing the products in DB using UploadProducts.php file , in console/command folder. See point #1

## 4. Error Handling: Implement robust error handling for API interactions and data processing.

For error handling we have used try/catch and used "ResponseTrait" that can be used to format the response in much efficient way. 

## 5. Data Update Mechanism: Update existing database entries to avoid duplicates.

As of now, we are updating the product if the "title" is same. You can find the logic on line #71-80 in file "UploadProducts.php", in console/command folder.

## 6. User Authentication: Create a system for user registration, login, and logout.

We have created three endpoints, signu/signin/logout, that can be used for user authentication. You can find these routes in routes/api.php and functionality in "AuthController".

## 7. Product Display: Implement a paginated display for authenticated users, showing 5 products per page.

I am bit confused about this reqiurement. If we just need to show the product then we can use the same GET "/product/list" and keep that route under the "Auth" middleware. Like these, only those users can acceess the route that are already authenticated.

Adding more, I have also used PSR-12 standards and focused on code readbility and reusability.

Thanks! 
