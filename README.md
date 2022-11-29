## About

Laravel project using Inertia (Vue flavour) for the frontend. Authentication via Laravel Breeze. This is a little way from my normal coding environment, it's a while since I've touched PHP nevermind Laravel (version 4 or 5 was my last exposure). I am more accostumed to being given an API to consume via a Vue.js frontend. 

# Admin Routes
	- /admin/posts
	- /admin/posts/create
	- /admin/posts/{id}
	- /admin/categories
	- /admin/categories/{id}
	- /admin/categories/create

# Routes
	- /
	- /posts/{id}
	- /categories/{id}

 # Known bugs

 There is a bug in the datepicker where when editing a post it will tell you have not entered a date, this is because the datepicker used is not respecting the `v-model` from `useForms` with more time I would debug this fully, or swap out the datepicker.

## With more time

I would not ordinarily release code with a test suite behind but given the time constraints and the nature of the role I felt it more important to deliver a visual product. In a ideal world there would a PHPUnit suite testing the controller, requests etc, and also a Jest suite testing the inertia front end. 

## Running

Following a checkout, you should be able to run `composer install`, `npm install`, `npm run dev` & `npm run serve` there are also migrations that can be run with `php artisan migrate` and seeders that can be run via `php artisan db:seed`. If you wish to go a manual route there is a .sql file in the root of the project. 