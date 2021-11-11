# EvalancheInterface

[![Packagist Version](https://img.shields.io/packagist/v/neubert/evalanche-interface?color=blue)](https://packagist.org/packages/neubert/evalanche-interface)
[![License MIT](https://img.shields.io/packagist/l/neubert/evalanche-interface?color=brightgreen)](https://packagist.org/packages/neubert/evalanche-interface)
[![Code Coverage 27%](https://img.shields.io/badge/coverage-35%25-yellow)](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md)
[![Code Completion 43%](https://img.shields.io/badge/completion-56%25-brightgreen)](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md)



## About EvalancheInterface

> **Note:** This is an inofficial wrapper arround the [Evalanche API](https://github.com/SC-Networks/evalanche-soap-api-connector/).

This interface is a consistent wrapper arround the SOAP API of Evalanche. It is currently focused on interacting with resources and profiles. *([See Support-List](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md))* The focus may expand to other features in the future. Feel free to leave a [feature request](#feature-requests) if you miss something.



## Getting Started

- [**Installation**](#installation)
- **~~Laravel Integration~~** *Planned*
- **~~Basic Usage~~** *Planned*
- **~~Documentation~~** *Planned*


## Installation

The recommended way to install the EvalancheInterface is using [Composer](https://getcomposer.org). To install the latest version just run the following command:

```sh
composer require neubert/evalanche-interface
```

Afterwards you should be able to use the EvalancheInterface within your project, like so:

```php
use Neubert\EvalancheInterface\Facades\Evalanche;

require __DIR__.'/vendor/autoload.php';

Evalanche::setup('username', 'password');

echo "<h1>Sub-Folders</p>";

Evalanche::folder(1234)->getFolders()->each(function ($folder) {
    echo "<p>{$folder->label}</p>";
});
```


## Requirements

- PHP >= 7.3
    - php-soap
- [Evalanche Soap API Connector](https://github.com/SC-Networks/evalanche-soap-api-connector/) >= 1.7 *(automatically required via composer)*


## Feature Requests

Since this project isn't a complete rebuild of the Evalanche API, you may require some additional methods. Please read the [support list for all implemented and planned method calls](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md) first.


If something is either not supported or missing feel free to send a [feature request](https://github.com/danielneubert/evalanche-interface/issues/new?labels=feature,question&assignees=danielneubert&title=[Feature-Request]).


## Issues

> **Note:** For any connection issues ensure at first that your account has the required permissions to execute the request. 

For inconsistent behaviors or errors feel free to [open up a new issue](https://github.com/danielneubert/evalanche-interface/issues/new?assignees=danielneubert&title=[Issue]).


## License

The EvalancheInterface is open-sourced software licensed under the [MIT license](https://github.com/danielneubert/evalanche-interface/blob/master/LICENSE.md).
