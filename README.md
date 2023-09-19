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

3. Once the package is installed, you need to register the service provider in your `config/app.php` file:

```json
'providers' => [
  ...
  Plentific\UserApiHandler\ServiceProvider::class,
  ...
]

```
## Usage
The UserService class provides methods for accessing user data. Here are some examples:
```json

use UserApiHandler\UserService;

// Create a UserService instance
$userService = new UserService();

// Get a single user by ID
$user = $userService->getUserById(1);

// Get a paginated list of users
$users = $userService->getPaginatedUsers(1);

// Create a new user
$newUser = $userService->createUser('John Doe', 'Admin');

```
For more usage details, refer to the source code.

## Testing
Unit tests are included in the tests directory. To run the tests, use the following command:
`vendor/bin/phpunit`

## Support
If you need assistance or have any questions, please open an issue in the GitHub repository.

## Contributing
Contributions are welcome! If you'd like to contribute, please submit pull requests.

## License
This package is licensed under the MIT License. See the License File for more information.
