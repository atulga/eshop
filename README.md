# eshop

# Requirements

### Technologies

HTML5, CSS3, MySQL, PHP5.5+, Javascript
Google analytics, Webmasters tool, SEO
Raw PHP, jQuery, AngularJS

### Security

Any form should include CSRF token.

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

### Admin panel

Keep in mind that admin panel can be used for supporting purposes.
Admin will be able to access backend and do followings:

  * Log in
  * Update user details
  * Activate, revoke, suspend, unsuspend users

### History / Logging

Any site activity is better to have its history especially for financial transactions.
Any email sent from system must be logged. Have an option to link entities and emails, vice versa.























