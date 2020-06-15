Write a web application for managing a personal collection of URLs (web links). Together with the URL, a description/comment and a category must be added to the database. The user can add, remove and modify URLs and the associated descriptions. Also the user can browse using AJAX the list of URLs grouped by their categories. Prior to using the application, a user must log in with a username and password which are stored in the database). URL browsing should be paged - URLs are displayed on pages with maximum 4 URLs on a page (you should be able to go to the previous and the next page).

In order for this to run, you must have the following in your mysql:

-an "html" db containing the following tables:

users
	-username varchar
	-password varchar

urls
	-url varchar
	-description varchar
	-category varchar