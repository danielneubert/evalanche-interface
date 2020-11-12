# EvalancheInterface

[![Packagist Version 0.1.0](https://img.shields.io/packagist/v/neubert/evalanche-interface)](https://packagist.org/packages/neubert/evalanche-interface)
[![License MIT](https://img.shields.io/packagist/l/neubert/evalanche-interface)](https://packagist.org/packages/neubert/evalanche-interface)
[![Code Coverage 15%](https://img.shields.io/badge/coverage-15%25-orange)](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md)



## About EvalancheInterface

> **Note:** This is an inofficial wrapper arround the [Evalanche API](https://github.com/SC-Networks/evalanche-soap-api-connector/).

This interface is a consistent wrapper arround the SOAP API of Evalanche. It is currently focused on interacting with resources and profiles. *([See Support-List](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md))* The focus may expand to other features in the future. Feel free to leave a [feature request](#feature-requests) if you miss something.



## Getting Started

- [**Installation**](#installation)
- **~~Laravel Integration~~** *Planned*
- **~~Basic Usage~~** *Planned*
- **~~Documentation~~** *Planned*


## Installation

The best way to install the EvalancheInterface to your project is using [Composer](https://getcomposer.org). To install the latest version just run the following command:

```sh
composer install neubert/evalanche-interface
```

Afterward you should be able to use the EvalancheInterface within your project, like so:

```php
<?php

use Neubert\EvalancheInterface\Facades\Evalanche;

require __DIR__.'/vendor/autoload.php';

Evalanche::setup('username', 'password');
```


## Requirements

- PHP >= 7.3
    - php-soap
- [Evalanche Soap API Connector](https://github.com/SC-Networks/evalanche-soap-api-connector/) >= 1.7 *(gets installed automatically if not included)*


## Feature Requests

Since this project isn't a complete rebuild of the Evalanche API, you may require some additional methods. Please read the [support list for all implemented and planned method calls](https://github.com/danielneubert/evalanche-interface/blob/master/SUPPORT.md) first.


If something is either not supported or missing feel free to send a [feature request](https://github.com/danielneubert/evalanche-interface/issues/new?labels=enhancement,question&assignees=danielneubert&title=[Feature-Request]).


## Issues

> **Note:** For any connection issues ensure at first that your account has the required permissions to execute the request. 

For inconsistent behaviors or errors feel free to [open up a new issue](https://github.com/danielneubert/evalanche-interface/issues/new?assignees=danielneubert&title=[Issue]).


## License

The EvalancheInterface is open-sourced software licensed under the [MIT license](https://github.com/danielneubert/evalanche-interface/blob/master/LICENSE.md).
