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
    ${keys}=  Create List  id  name  address  phone  email
    Sort List ${keys}
    ${checkKeys}=  Get Dictionary Keys  ${jsondata['info'][0]}
    Should Be Equal As Strings  ${response.status_code}  200
    Should Contain  ${checkKeys}  ${keys}
