*** Settings ***
Library  Collections
Library  RequestsLibrary
Library  Selenium2Library
Library  String
Suite Teardown  Delete All Sessions
*** Test cases ***
Stores Info Test
    Create Session  api  http://localhost:8000
    ${response}=  Get Request  api  /stores.php
    ${jsondata}=  To Json  ${response.content}
    ${keys}=  Create List  address  email  id  name  phone
    ${checkKeys}=  Get Dictionary Keys  ${jsondata['info'][0]}
    Should Be Equal As Strings  ${response.status_code}  200
    Lists Should Be Equal  ${checkKeys}  ${keys}
    ${params}=  Create Dictionary  store=1
    ${response}=  Get Request  api  /stores.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    ${keys}=  Create List  address  email  id  name  phone
    ${checkKeys}=  Get Dictionary Keys  ${jsondata['info'][0]}
    Should Be Equal As Strings  ${response.status_code}  200
    Lists Should Be Equal  ${checkKeys}  ${keys}
    ${params}=  Create Dictionary  store=123
    ${response}=  Get Request  api  /stores.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  404
    ${params}=  Create Dictionary  store=invalid_id
    ${response}=  Get Request  api  /stores.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400
    ${params}=  Create Dictionary  store=3.33
    ${response}=  Get Request  api  /stores.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400

Stores With Product Test
    Create Session  api  http://localhost:8000
    ${params}=  Create Dictionary  product=1
    ${response}=  Get Request  api  /stores_with_product.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    ${keys}=  Create List  id  name
    ${checkKeys}=  Get Dictionary Keys  ${jsondata['stores'][0]}
    Should Be Equal As Strings  ${response.status_code}  200
    Lists Should Be Equal  ${checkKeys}  ${keys}
    ${response}=  Get Request  api  /stores_with_product.php
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400
    ${params}=  Create Dictionary  product=invalid_id
    ${response}=  Get Request  api  /stores_with_product.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400
    ${params}=  Create Dictionary  product=3.33
    ${response}=  Get Request  api  /stores_with_product.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400

Store Products Test
    Create Session  api  http://localhost:8000
    ${params}=  Create Dictionary  store=1
    ${response}=  Get Request  api  /store_products.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  200
    ${response}=  Get Request  api  /store_products.php
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400
    ${params}=  Create Dictionary  store=3.33
    ${response}=  Get Request  api  /store_products.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400
    ${params}=  Create Dictionary  store=invalid_id
    ${response}=  Get Request  api  /store_products.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  400
    ${params}=  Create Dictionary  store=43
    ${response}=  Get Request  api  /store_products.php  params=${params}
    ${jsondata}=  To Json  ${response.content}
    Should Be Equal As Strings  ${response.status_code}  404

