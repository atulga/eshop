# eshop

# Requirements

### Technologies
HTML5, CSS3, MySQL, PHP5.5+, Javascript
Google analytics, Webmasters tool, SEO
Raw PHP, jQuery, AngularJS

### History / Logging
Any site activity is better to have its history especially for financial transactions.
Any email sent from system must be logged. Have an option to link entities and emails, vice versa.

### Web site template
Web site design must be responsive.

### Security
Any form should include CSRF token.
Sensitive information such as card details and password must be encrypted in DB.
Protect user privacy and let know. Email, phone etc. Show public only if they intent to.

### Register page
Anyone who visit the site can be registered.
With their name, email, password and delivery details.
Show terms and agreement.

### Email activation
Activation email is sent to the user.
User can log in after they access via that link.
A new user with "user" role will be created.

### Login page
User logs in if account is activated, not revoked or suspended.
Multiple incorrect attempt will show captcha.
More than multiple incorrect attempt will suspend the account.
If account has been suspended send email to user with unsuspend link.

### Register and login via third party accounts Facebook, Google plus
Its should be simple as a click away. Though users still need to fill in some details

### User profile page
Any user (user, merchant, (e-)delivery man) must have their profile page to edit.
It includes "remove registration" option.
User can add/edit following details:
* Name, email, password, image
* Phone number and address

### Merchant and Product Category, Tags and Page
Merchant can have a dedicated page to show only product, category and tags from that user.
Category is a nested entity while tags are not.
Tag is identified only by its name. Category will have a name and its description.
Merchant page shows:
* Merchant information with contact option
* Category and tag list showing how many item each holds.
* Product list with same filtering option as the main site

### Merchant and Product
Merchant log in to add a Product. Details include:
* Title
* Excerpt
* Description
* Available Quantity
* Price
* Images. Up to 10. Preview and crop upon upload.
* Select from predefined product categories
* Select from existing tags or add custom
* Whether this is an e-content.

### Merchant and questions received
Registered users could ask questions about the product before buying.
Merchant should be able to answer them. Email notification should be sent back to the user upon answer.

### Merchant report
Reason: To improve the product and site experience.
Let them know about how much his product and pages are viewed.
How much they are tried to be bought and actually sold.
Share amount of the product and the page.

### Product listing
Product must be searchable. Browsable by its category and tags.
Each product must show its image, title, merchant name and its price.
Filterable by its category, tags and price.
Make sure user can share current view to others.

### Buy product
This must happen in a few clicks or keystrokes as possible.
User goes to product detail page and click buy button.
User must fill delivery details like address and phone number.
He/she can also include receiving request like date or time.
System reminds about the sensitive purchase terms.
And goes through payment process and returns to the site.
Upon successful purchase:
* User, the buyer, receives an email about the purchase information and delivery details with some purchase terms.
* Merchant receives an email notification about the product and specific delivery request by user. An option to contact the delivery man.
* Delivery man receives email about the delivery information and an option to contact the merchant.
* E-Delivery man receives email about the delivery and an option to contact the merchant and send the e-content right away to the customer.

### Ask a question
Any registered user can ask question about the product.
Can also contact the merchant about a special request.

### Share product or merchant to social or via email
Categories, Product or Merchant page must be shareable to facebook or twitter.

### Custom pages
Admin is able to add custom pages to detail any information to be linked.
Let them be linked within page footer, home page, menu and within a custom page.

### Report bad product or merchant
Users can help admin to detect bad product or merchant.
User should fill a form detailing the reason to be flagged.

### SEO
Product page, Merchant page, Product category page or almost every page must keep in mind about the search engine.

### Admin panel
Keep in mind that admin panel can be used for supporting purposes.
Admin will be able to access backend and do followings:

* Log in, out
* Add, edit, remove users. Roles are: User, Merchant, Delivery Man, E-Delivery Man
* Update user details
* Activate, revoke, suspend, unsuspend users
* Add or remove content pages
* Browse site history and browse sent emails
* Review reported merchant and products
* Manage categories. Category name, description, image
* Manage tags. Custom and official tags
* Manage products
* Modify custom pages and their links
* See overall report almost about everything
* See activity, inactivity by site, merchant, product, user and (e-)delivery man.
