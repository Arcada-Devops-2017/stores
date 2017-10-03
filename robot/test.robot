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
    Should Be Equal As Strings  ${response.status_code}  200
    ${jsondata}=  To Json  ${response.conte}
    Should Be Equal  ${jsondata['message']}  Cx
