# Stores

One Paragraph of project description goes here

## Api Endpoint för att lista alla butiker 

Listar ut alla butiker som finns.

[stores.arcada.nitor.zone/api/stores.php](stores.arcada.nitor.zone/api/stores.php)
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

## Api för att lista ut en butiks info

Listar en butiks all information.

Behöver parametern "store".
[stores.arcada.nitor.zone/api/store.php?store=0](stores.arcada.nitor.zone/api/store.php?store=0)
```JSON
{  
   "status":200,
   "info":{  
      "id":0,
      "name":"Store 0",
      "address":"hurr durr 123",
      "phone":"+358700123123"
   }
}
```

## Api endpoint för att visa butiker som har en produkt

Visar alla butiker som har en viss produkt i lager.

Behöver parametern "product".
[stores.arcada.nitor.zone/api/stores_with_product.php?product=0](stores.arcada.nitor.zone/api/stores_with_product.php?product=0)
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

Behöver parametern "store".
[stores.arcada.nitor.zone/api/store_products.php?store=0](stores.arcada.nitor.zone/api/store_products.php?store=0)
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
