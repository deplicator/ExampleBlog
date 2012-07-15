ExampleBlog
===========
An example blog from this book I found.
PHP for Absolute Beginners by Jason Lengstorf
http://www.apress.com/9781430224730/

For the most part I followed his instructions.


==Rewrite Issues==
I had a problem getting the RewriteRules to work correctly. I didn't see anything
about it in the book, but there is a good chance I missed it. I learned there is
a lot more to RewriteRules than simply editing the .htaccess file.

First thing I tried was

    sudo a2enmod rewrite

in the terminal, and it returned a message telling me rewrite was already on.

After more reading I learned about apache2's 'modes-enabled' and 'modes-available' 
folders. There is a file named 'rewrite.load' in 'modes-available', and 
'modes-enabled' is full of symbolic links to 'modes-available'. I did not have 
a symbolic link to rewrite.load in 'modes-enabled'.

    cd /etc/apache2/modes-enabled
    sudo ln-s ../mods-available/rewrite.load rewrite.load

    sudo /etc/init.d/apache2 restart

After that, it still didn't work. Next I learned about the 'sites-enabled' folder 
through an obscure, hard to read, website. I edited the file

    /etc/apache2/sites-enabled/000-default

restarted apache2 and was successful. The changes I made can be found near the 
top of the file between the tags that start with <Directory>. If I remember right 
all I had to change was the AllowOverride line from none to all.

    <Directory />
        Options FollowSymLinks                
        AllowOverride all        
    </Directory>        

    <Directory /var/www/>                
        Options FollowSymLinks                 
        AllowOverride all                
        Order allow,deny                
        allow from all        
    </Directory> 