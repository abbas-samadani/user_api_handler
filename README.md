# User API Handler

This package provides a convenient way to interact with the Reqres API and handle user data.

## Installation

To install UserApiHandler directly from GitHub, follow these steps:

1. Add the following to your `composer.json` file:

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/abbas-samadani/user_api_handler"
  }
]
```
2. Run the following command to install the package:
`composer require plentific/user-api-handler`

3. Once the package is installed, you need to register the service provider in your config/app.php file:

php
'providers' => [
...
Plentific\UserApiHandler\ServiceProvider::class,
...
],
