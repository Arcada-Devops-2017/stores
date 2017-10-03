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
    Should Be Equal As Strings  ${response.status_code}  200
    Should Contain As Strings  ${jsondata['info']}  {'id':1,'name':'Test 1','address':'Test address','phone':1234567,'email':'test@email.com'}