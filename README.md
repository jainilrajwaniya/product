<p align="center"><a href="#" target="_blank">Hola!</a></p>

## About Product

Product is a api application, with all the required apis one by one:-

## 1. Scheduled Data Fetching: Set up Laravel task scheduler for data fetching every 2 hours.

We can get to see this file, UploadProducts.php, in console/command folder. You can execute this command manually as well using command "php artisan upload-products" 

## 2. API Pagination: Fetch 10 products per request, covering the first 3 pages.

In GET "/product/list" api we have used "paginate()" method that will return us the products the we want. We can choose the number of product to be retuned in one page 

### 3. Database Storage: Use MySQL to store product details (ID, name, description, price, etc.).

We can store the products using UploadProducts.php file , in console/command folder.

## 4. Error Handling: Implement robust error handling for API interactions and data processing.

We have used the "ResponseTrait.php", that can be used to format the response. For error handling we have used try/catch and used "ResponseTrait". 

## 5. Data Update Mechanism: Update existing database entries to avoid duplicates.

As of now, we are updating product if the "title" is same. You can find the logic on line #71-80 in file "UploadProducts.php", in console/command folder

## 6. User Authentication: Create a system for user registration, login, and logout.

We have created three endpoints signu/signin/logout is used for user authentication. You can find these routes in routes/api.php and functionality in "AuthController"

## 7. Product Display: Implement a paginated display for authenticated users, showing 5 products per page.

I am bit confused about this reqiurement. If we just need to show the product then we can use the same GET "/product/list" and keep that route under the "Auth" middleware.


Adding more, I have also used PSR-12 standards and focused on code readbility and reusability.

Thanks! 
