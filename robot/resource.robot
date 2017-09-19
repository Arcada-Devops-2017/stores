*** Settings ***
Library     Selenium2Library

*** Variables ***
${URL}          http://localhost/
${BROWSER}        firefox

*** Keywords ***
Open Browser to application page
    Open Browser   ${URL}

Check for PHP Version in content
    Page Should Contain     PHP Version