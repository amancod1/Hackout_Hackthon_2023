![](./resources/logo.gif)
# TravelGenie - Generative AI 
A Generative AI Powered Platform for Travel App & Publishing Industry.


# [Visit Deployed Site Here](https://hackout.teamcode.tech/)  
UserID: user@gmail.com 
Password: user@gmail.com    |   AdminID: admin@gmail.com
Password: admin@gmail.com

## Problem it Solves

- Planning of  travel and preparation of travel iteniary with detailed nuances.
- Giving essential summary and assisting the user with Generative AI Chatbots.
- Empowering publising and creator space for travel domain by proving all type of content generation for blogs, videos with copyright free assets.

### AI Feature of Travel.Genie
- Summarization, PDf chat with Langchain, Curated guide from Generative AI.
- Create templates and generate content from fine tuned LLMs for specific domain.
- Get transcipt for Youtube Video with maximum accuracy.
- Speech Syntesis with Human tones.
- Royalty free high quatilty image generation with positive and negative prompting
- create User Profile, with subscription plans
- And many more
### Basic Features
- Book rentals, flights, tour packages.
- Explore various categories of Hotels, Places and destinations.
- Search and get the curated results of places based on ratings, price aggregator.
- Apply various filters to get desired result.



### PoC UI [ Travel.Genie Creator Web App + Travel App] 
<pre>
<img src="./resources/1.png" alt="1"  /><img src="./resources/2.png" alt="1"  /><img src="./resources/3.png" alt="1"  /><img src="./resources/4.png" alt="1"  />
</pre>

<pre>

<img src="./resources/ui.png" alt="1"  /><img src="./resources/ui.png" alt="1"  />
</pre>

## Technology Used
- React, Javascript
- HTML CSS Bootstrap
- PHP Laravel Blade
- MySQL Firebase 
- Azure Voice, Wishper
- SST TTS, GCP
- Gradio OpenAI API
- Stable Diffusion Dall-E
- Hugging Face API

## Challenges we faced
- Creating engaing UI for Travel.Genie
- Using Fine tuned custom LLM models
- Prompt engineering to control responses
- Integrating multimodal features to one platform
- Database Desgin to handle all assets
- Providing enterprise features of shared workspace
- Gathering the data of categories as such hotels, restaurants, dineouts, beachers, etc.
- Building the database for co-ordinates(latitude and Longitude) of the places.
- Fetching reviews and ratings.
- Plaing the searching parameters.
- integrating multiple 3rd party services like maps, booking sites was the trickiest part.

## Proposed Enhancements
- Creating pipeline between vendor app and Travel.Genie AI.
- integrating ride booking.
- Live in-app events.
- Support for connecting chain on institutions.

## Installation of Project
Prerequisite
PHP v8.1,PHP Mbstring Extension,PHP PDO Extension,PHP FileInfo Extension,PHP JSON Extension,PHP CURL Extension,PHP ZipArchive Extension,PHP symlink() function,PHP shell_exec() function,PHP file_get_contents() function

Setup Wamp or Xampp Server in case of Windows or LAMP Server in case of Linux or MAMP in case of Mac, Here I have used Cpanel beacause it is easy to setup in cpanel.

Zip and upload only the contents of github Project to the root directory of your hosting server. Ex: /var/www/html/ or /home/username/public_html or whatever is the root folder of your domain/subdomain which will make it reachable as follows: http://yourwebsitename/ like in my case https://hackout.teamcode.tech

After uploading all files and making sure that domain name has proper path set, create Mysql database and proper user in case if you don't already have one, to access this database. You can either create manually via your phpMyAdmin panel or use phpMyAdmin Wizard in your cPanel to create one

Now open .env.example file in file manager and add the following details:- APP_URL= APP_EMAIL= DB_CONNECTION=mysql DB_HOST=localhost DB_PORT=3306 DB_DATABASE= DB_USERNAME= DB_PASSWORD= OPENAI_SECRET_KEY= Chatgpt api key finalyy change .env.example to .env and then save.

Finally Import .sql content into phymyadmin of cpanel

Boom!! Now you can open your Project with credentials user@gmail.com and user@gmail.com
### Contributors
- Aman Gupta 
- Shashank Kumar
- Prakhar Singh
- Prarthana Agrawal

Built with ❤️ by Team C.O.D.E <br>
At Hackout 2023, DTU
