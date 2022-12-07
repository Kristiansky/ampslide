# Task for AmpSlide

## Instructions for a local install

1. Clone the code on your machine
2. Create a virtual host pointing to the `/public` directory for example `c:/wamp64/www/ampslide/public`
3. Create an empty database with a collation utf8_general_ci 
4. Copy `env` to `.env` and edit the file, specifically the baseURL and any database settings.
5. From a terminal in the root folder, run the command `php spark migrate`
6. Run the script from browser