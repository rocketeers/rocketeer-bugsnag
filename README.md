# Bugsnag for Rocketeer

Track your deploys in Bugsnag using their [tracking api](https://bugsnag.com/docs/deploy-tracking-api)

## Installation

```shell
$ rocketeer plugin:install rocketeers/rocketeer-bugsnag
```

Then add this to the `plugins.loaded` array in your configuration:

```php
<?php
'loaded' => [
    'Rocketeer\Plugins\Bugsnag\Bugsnag',
],
```

## Usage

To export the configuration, simply run `rocketeer plugin:config` then edit `.rocketeer/config/plugins/rocketeer-bugsnag`.