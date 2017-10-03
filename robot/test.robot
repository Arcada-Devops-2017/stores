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
    ${keys}=  ['id','name','address','phone','email']
    ${checkKeys}=  Get Dictionary Keys  ${jsondata['info'][0]}
    Should Be Equal As Strings  ${response.status_code}  200
    Should Contain  ${keys}  ${checkKeys}
