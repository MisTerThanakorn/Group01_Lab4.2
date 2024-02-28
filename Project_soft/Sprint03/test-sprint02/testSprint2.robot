*** Settings ***
Documentation     Example test case for opening Chrome browser.
Library           SeleniumLibrary

*** Test Cases ***
Open Chrome Browser
    Open Browser    http://localhost:8080/th/    Chrome
    Maximize Browser Window
    Element Text Should Be    class:products-section-title    สินค้ายอดนิยม 
    Element Text Should Be    id:contact-link    ติดต่อเรา
    Sleep    2s
    Click Element    xpath=//a[@title="English (English)"]
    Element Text Should Be    class:products-section-title    POPULAR PRODUCTS 
    Element Text Should Be    id:contact-link    Contact us
    Sleep    2s
    Click Element    xpath=//a[@title="Bahasa Indonesia (Indonesian)"]
    Element Text Should Be    class:products-section-title    PRODUK POPULER
    Element Text Should Be    id:contact-link    Hubungi kami
    Sleep    2s

Change languages on Login Page:
    Open Browser    http://localhost:8080/th/    Chrome
    Maximize Browser Window
    Click Element    class:user-info
    Element Text Should Be    css=[for="field-email"]    อีเมลล์ 
    Element Text Should Be    css=[for="field-password"]    รหัสผ่าน
    Sleep    2s
    Click Element    xpath=//a[@title="English (English)"]
    Element Text Should Be    css=[for="field-email"]    Email 
    Element Text Should Be    css=[for="field-password"]    Password
    Sleep    2s
    Click Element    xpath=//a[@title="Bahasa Indonesia (Indonesian)"]
    Element Text Should Be    css=[for="field-email"]    Surel 
    Element Text Should Be    css=[for="field-password"]    Kata sandi
    Sleep    2s


Change languages on Product Page:
    Open Browser    http://localhost:8080/th/    Chrome
    Maximize Browser Window
    Click Element    css=img[alt="[ สั่งของล่วงหน้า ] หมวก - วิทยาลัยคอมพิวเตอร์ มหาวิทยาลัยขอนแก่น"]
    Element Text Should Be    class:tax-shipping-delivery-label    รวมภาษีแล้ว
    Sleep    2s
    Click Element    xpath=//a[@title="English (English)"]
    Element Text Should Be    class:tax-shipping-delivery-label    Tax included
    Sleep    2s
    Click Element    xpath=//a[@title="Bahasa Indonesia (Indonesian)"]
    Element Text Should Be    class:tax-shipping-delivery-label    Termasuk pajak
    Sleep    2s


Change languages on All Product Page:
    Open Browser    http://localhost:8080/th/    Chrome
    Maximize Browser Window
    Click Element    css=a.all-product-link
    Element Text Should Be    class:subcategory-heading    หมวดย่อย
    Sleep    2s
    Click Element    xpath=//a[@title="English (English)"]
    Element Text Should Be    class:subcategory-heading    Subcategories
    Sleep    2s
    Click Element    xpath=//a[@title="Bahasa Indonesia (Indonesian)"]
    Element Text Should Be    class:subcategory-heading    Sub kategori
    Sleep    2s

    





