# jxOrderFields #

OXID eShop Extension for Supporting more fields in oxOrderArticles


## Setup ##

1. Unzip the complete file with all the folder structures and upload the content of the folder copy_this to the root folder of your shop.
2. In the admin backend of the shop go to _Extensions_ - _Modules_. Select the module _jxOrderFields_.
3. If the **shop version is 4.10 or higher** first switch to the tab _Settings_ and enter these fields  (one in each line) from oxarticles you want to transfer additionally to oxorderarticles on each sale and save the settings. `Activate` the module now.    
If the **shop version is 4.9 or lower** you have to activate the module at first before you are able to change the settings. Click on `Activate` and switch to _Settings_. Enter these fields  (one in each line) from oxarticles you want to transfer additionally to oxorderarticles on each sale and save the settings. Now `Deactivate` the module once and `Activate` it again for checking and creating the database fields as specified by the settings.
4. As an alternative method to the automatically created fields, you can create the additional database fields in the table oxorderarticles manually, but with the prefix jx instead of ox.

**Hints**  
  * Later changes (eg. larger field) made on the original fields will be not handled by the module.
  * The activation events works as well for the built-in fields as for custom fields.
  
## Screenshots ##

tbd ...