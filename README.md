# Stores

One Paragraph of project description goes here

## Api Endpoint för att lista alla butiker 

För att lista alla butiker som finns.  
[Link till sidan](stores.arcada.nitor.zone/api/stores.php)

```
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
[Link till sidan](stores.arcada.nitor.zone/api/store.php?store=0)
```
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
[Link till sidan](stores.arcada.nitor.zone/api/stores_with_product.php?product=0)
```
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
[Link till sidan](stores.arcada.nitor.zone/api/store_products.php?store=0)
```
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

### Prerequisites

What things you need to install the software and how to install them

```
Give examples
```

### Installing

A step by step series of examples that tell you have to get a development env running

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone who's code was used
* Inspiration
* etc
