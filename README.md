# Stores

Dokumentation för alla stores APIer.


## Api för att lista ut alla butikernas information

Default: Listar ut alla butikers information.

Med parametern "store" (store id) kan man hämta en en viss butiks information.


Exempel UTAN "store" parameter: (returnerar alla butikers info)
[http://stores.arcada.nitor.zone/api/stores.php](http://stores.arcada.nitor.zone/api/store.php)

```JSON
{  
   "status":200,
   "info":[
      {  
         "id":0,
         "name":"Store 0",
         "address":"hurr durr 123",
         "phone":"+358700123123",
         "email":"info@store0.com"
      },
      {  
         "id":1,
         "name":"Store 1",
         "address":"asdfgh 222",
         "phone":"+3585011111111",
         "email":"info@1store.com"
      }
   ]
}
```


[http://stores.arcada.nitor.zone/api/stores.php?store=0](http://stores.arcada.nitor.zone/api/store.php?store=0)

Exempel MED "stores" parametern: (returnerar en viss butiks info)

```JSON
{  
   "status":200,
   "info":[
      {  
         "id":0,
         "name":"Store 0",
         "address":"hurr durr 123",
         "phone":"+358700123123",
         "email":"info@store0.com"
      }
   ]
}
```


## Api endpoint för att visa butiker som har en produkt

Visar alla butiker som har en viss produkt i lager.

Behöver parametern "product" (product id).

[http://stores.arcada.nitor.zone/api/stores_with_product.php?product=0](http://stores.arcada.nitor.zone/api/stores_with_product.php?product=0)
```JSON
{  
   "status":200,
   "stores":[  
      {  
         "id":0,
         "name":"Store 0"
      },
      {  
         "id":1,
         "name":"Store 1"
      }
   ]
}
```

## Api endpoint för att visa alla produkter en butik har

Visar alla produkter som en butik har i lager.

Behöver parametern "store" (store id).

[http://stores.arcada.nitor.zone/api/store_products.php?store=0](http://stores.arcada.nitor.zone/api/store_products.php?store=0)
```JSON
{  
   "status":200,
   "products":[  
       0,
       1,
       2,
       3,
       4
   ]
}
```
