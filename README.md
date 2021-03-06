# Stores

Dokumentation för alla stores APIer. Svaren är i JSON format.


## Api för att lista ut alla butikernas information

Default: Listar ut alla butikers information.

Med parametern "store" (store id) kan man hämta en en viss butiks information.


Exempel UTAN "store" parameter: (returnerar alla butikers info)
[http://stores.arcada.nitor.zone/api/stores.php](http://stores.arcada.nitor.zone/api/stores.php)

```JSON
{  
   "status":200,
   "info":[
      {  
         "id":1,
         "name":"Store 1",
         "address":"hurr durr 123",
         "phone":"+358700123123",
         "email":"info@store0.com"
      },
      {  
         "id":2,
         "name":"Store 2",
         "address":"asdfgh 222",
         "phone":"+3585011111111",
         "email":"info@1store.com"
      }
   ]
}
```


[http://stores.arcada.nitor.zone/api/stores.php?store=1](http://stores.arcada.nitor.zone/api/stores.php?store=1)

Exempel MED "stores" parametern: (returnerar en viss butiks info)

```JSON
{  
   "status":200,
   "info":[
      {  
         "id":1,
         "name":"Store 1",
         "address":"hurr durr 123",
         "phone":"+358700123123",
         "email":"info@store0.com"
      }
   ]
}
```

Visas om givna parametern är felaktig (inte ett heltal / integer).


```JSON
{  
   "status":400,
   "info":[]
}
```

Visas om stores inte hittades med givna parametern.

```JSON
{  
   "status":404,
   "info":[]
}
```

## Api endpoint för att visa butiker som har en produkt

Visar alla butiker som har en viss produkt i lager.

Behöver parametern "product" (product id).

[http://stores.arcada.nitor.zone/api/stores_with_product.php?product=1](http://stores.arcada.nitor.zone/api/stores_with_product.php?product=1)
```JSON
{  
   "status":200,
   "stores":[  
      {  
         "id":1,
         "name":"Store 1"
      },
      {  
         "id":2,
         "name":"Store 2"
      }
   ]
}
```

Visas om ingen produkt id har givits eller om produkt id:n är felaktig (inte ett heltal / integer).

```JSON
{  
   "status":400,
   "stores":[]
}
```

## Api endpoint för att visa alla produkter en butik har

Visar alla produkter som en butik har i lager.

Behöver parametern "store" (store id).

[http://stores.arcada.nitor.zone/api/store_products.php?store=1](http://stores.arcada.nitor.zone/api/store_products.php?store=1)
```JSON
{  
   "status":200,
   "products":[  
       1,
       2,
       3,
       4
   ]
}
```

Visas om store id:n är felaktig (inte ett heltal / integer).

```JSON
{  
   "status":400,
   "products":[]
}
```

Visas om storen inte hittas.

```JSON
{  
   "status":404,
   "products":[]
}
```
