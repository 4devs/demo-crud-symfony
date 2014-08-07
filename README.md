demo-crud-symfony
=================

### Step 1: Download

``` bash
$ git clone git@github.com:4devs/demo-crud-symfony.git src/FDevs/CRUDBundle
```

### Step 2: Enable the bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new FDevs\CRUDBundle\FDevsCRUDBundle(),
    );
}
```

``` yaml
# app/config/routing.yml
f_devs_crud:
    resource: "@FDevsCRUDBundle/Resources/config/routing.xml"
    prefix:   /

```
 