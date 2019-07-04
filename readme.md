# Test Chat

## Overview

### Description

This repository contains a basic automatic assistant. It works with a database table that contains possible questions
and their [Answers](https://github.com/mauro-moreno/test-chat/blob/master/database/migrations/2019_06_30_063823_create_answers_table.php).

### Chat features

- Multi-language
- Test page at [http://localhost/test/](). Optional parameter `language`.
- Launcher button that opens interface with [BOBSHOP](https://www.bobshop.com) look and feel.
- Interface shows a welcome message, input and send button [http://localhost/](). Optional parameter `langauge`
- Message can also be sent pressing Enter button.
- Message is sent to [http://localhost/api/{language}/chat/ask](). Required parameter `language`.
- Possible answers:
  - **None**. If no answers is found, chat response is a default "Did not understand" answer.
  - **One**. If one answer is found, chat response is one of three options.
    - **Basic answer**. If a basic answer is found, chat respond its text.
    - **Redirect answer**. If a redirect answer is found, chat respond its text and redirect to defined location.
    - **Derive answer**. If a derive answer is found, chat respond its text and derive to a human operator.
  - **More than one**. If more than one answer is found, chat response is a list of possible questions that user
    could have possible asked.
- Close button
    
### Admin features

- Login [http://localhost/login]()
  - Default user: admin@bobshop.com
  - Default password: admin
- Welcome page [http://localhost/admin/home]()
- Languages CRUD [http://localhost/admin/languages]()
- Answers CRUD [http://localhost/admin/answers]()
- Logout [http://localhost/logout]()

## Requirements

- [Git](https://git-scm.com/downloads)
- [Docker](https://www.docker.com/products/docker/) `>= 17.12`
- If not using docker, requirements:
  - PHP >= 7.1.3
  - BCMath PHP Extension
  - Ctype PHP Extension
  - JSON PHP Extension
  - Mbstring PHP Extension
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension
  - MySQL

## Installation

### Get code

**Clone repository:**

`$ git clone https://github.com/mauro-moreno/test-chat`

**If using docker:**

`$ git submodule init`

`$ cd ./laradock && docker-compose up -d nginx mysql`

`$ docker-compose exec --user=laradock workspace bash`

**Configuration**

`$ composer install`

`$ cp .env.example .env`

`$ php artisan key:generate`

**Database migration**

`$ php artisan migrate:fresh --seed`

**For development**

`$ npm install`

`$ npm test`

## Test questions and answers.

Language | Question | Answer | Action | Parameter
---------|----------|--------|--------|-----------
**en** | How much does it cost a bike |  $200  | basic  | none
**en** | Forgot password | Redirecting to forgot... | redirect | https://www.bobshop.com/en/account/password
**en** | Product size | Available size: S, M, L, XL | basic | none
**en** | Shipping cost | Shipping costs $100. | basic | none
**en** | Product availability | This product is in stock right now. | basic | none
**en** | Derive to an operator | Deriving to an operator | derive | https://www.bobshop.com/en/contact-us
**es** | Cuanto cuesta una bicicleta | $200 | basic | none
**de** | Hallo | Hallo | basic | none
**en** | asdf | Default answer | none | none
**en** | a | List of questions that contains "a" | more | none


## License

The project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
