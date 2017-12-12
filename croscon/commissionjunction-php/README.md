# Commission Junction PHP API Library

## Installation

### Composer

Simply add the CommissionJunction API library to your `composer.json` file:

```js
{
    "require": {
        "croscon/commissionjunction-php": "dev-master"
    }
}
```

## Configuration

The API library simply needs your Commission Junction developer key (which can be obtained at [https://api.cj.com/sign_up.cj](https://api.cj.com/sign_up.cj)).

```php
<?php
$client = new \CROSCON\CommissionJunction\Client($api_key);
```

## Usage

Commission Junction's API documentation can be found [here](http://help.cj.com/en/web_services/web_services.htm#welcome_page.htm).

The API library provides a generic `api($subdomain, $resource, array $params = array(), $version = 'v2')` method that accepts the subdomain, resource name, GET parameters, and optionally the api version number. When you view an individual REST service's documentation page, you will see a sample URI at the top of the page. The URI maps to the `api(...)` method as follows:

> https://**SUBDOMAIN**.api.cj.com/**VERSION**/**RESOURCE**?**PARAMS**

Alternatively the library provides a few convenience methods for the major resources listed in the documentation:

```php
<?php
$client->productSearch($parameters);
$client->linkSearch($parameters);
$client->publisherLookup($parameters);
$client->advertiserLookup($parameters);
$client->supportLookup($resource, $parameters);
```

Each method corresponds to the individual resource documentation pages found under the "REST APIs" section.