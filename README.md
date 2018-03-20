# IT490-RabbitMQ

Setup RabbitMQ onto Ubuntu Linux


Project by 
Varsha Ravi
Mariya Khan
James Gilles
Diego Mejia

[STEP: 1]
Ensure that the following packages are installed follow configuration 

THE sudo commands are all performed in the terminal:

sudo apt-get install vim
sudo apt-get install aptitude
sudo apt-get install apache2
sudo apt-get install php7.0 libapache2-mod-php7.0
sudo apt-get install git
sudo apt-get install mysql-server
sudo apt-get install rabbitmq-server

----------------The scripts from the professor's GITHUB------------------------
git clone https://github.com/EngineerOfLies/rabbitmqphp_example
------------------------------------------------------------------------------

sudo apt-get install syslog-ng-core
sudo apt-get install syslog-ng-mod-amqp
sudo rabbitmq-plugins enable rabbitmq_management
sudo service rabbitmq-server (start or stop or restart) 
sudo apt-get install php7.0-mbstring
sudo apt-get install php-amqp

---------Adjustment to be made in:------------------------------------
sudo vim /etc/php/7.0/cli/apache2/php.ini
-->Include the statement around line 877: extension = amqp.so

---------To enable AMQP ------------------------------------------------------

cd /etc/php/7.0/cli/conf.d
sudo ln -s /etc/php/mods-available/amqp.ini


----------------OPEN an internet browser---------------------------------------
	
	** INITIAL RabbitMQ access is LOCALHOST SERVICE ONLY!! while in guest mode **

	Open a browser, in dialog box type "localhost:15672"
		Rabbitmq login page username = guest login = guest
	[Admin] tab, this is where a new user or Virtual Host can be added.
-------------------------------------------------------------------------------

[STEP: 2]

Download the IT490-RabbitMQ github files and change directory to  /var/www/html

Open a new browser tab and type into the url: localhost/index.html

Confirm that an Apache2 welcome page appears.

Back to terminal, rename or remove the index.html file that currently exist in /var/www/html directory.

Copy the downloaded from the Downloads directory.  Use sudo command to manipulate scripts and files in /var/ directory 
due to the fact that that is an authorized user capability.

Open a new browser tab and type into the url: localhost/blog.html

***>>Make the correct adjustment to the IP address & login info in the ->  vmdaj.ini
This will allow the user the ability to see transactions through RabbitMQ. 


//DISCLAIMER!
//New User BE AWARE of MySQL input.  Make Adjustment to con.php to match a database created by a new user.




	
