# jxOrderFields #

OXID eShop Extension for Supporting more fields in oxOrderArticles

## OXID eShop Versions

The module is available for the following versions
  * **OXID eShop 6** (actual module version)
  * OXID eShop 4.x / 5.x ([download here](https://github.com/job963/jxOrderFields/tree/oxid-4x))


## Setup ##

### OXID eShop 6

1. Install the module  
    ```composer config repo.JxMods/JxOrderFields git https://github.com/job953/jxorderfields.git```

    ```composer require jxmods/jxorderfields```

2. Activate the module  
Navigate in the admin backend of the shop to _Extensions_ - _Modules_.  
Select the module _jxOrderFields_ and click on `Activate`.

If you open the menu _Products_, you will see the the new menu item _Text Finder_.

3. First switch to the tab _Settings_ and enter these fields  (one in each line) from oxarticles you want 
to transfer additionally to oxorderarticles on each sale and save the settings. `Activate` the module now.    
The fields, defined in the settings, will be created in the table oxorderarticles during the module activation 
if they don't exist. To avoid conflicts, the prefix _ox_ will be removed and replaced by the prefix _jx_.  
If you later add more fields to the settings, you have to `Deactivate` the module once and `Activate` it 
again for checking and creating the new database fields.

4. As an alternative method to the automatically created fields, you can create the additional database 
fields in the table oxorderarticles manually, but with the prefix jx instead of ox.

### OXID eShop 4/5

Goto branch [oxid-4x](https://github.com/job963/jxOrderFields/tree/oxid-4x) and follow the instructions there.


### Examples

_oxorder_.oxean --> _oxorderarticles_.jxean  
_oxorder_.oxvendorid --> _oxorderarticles_.jxvendorid

### Hints
  * Later changes (eg. larger field size) made on the original fields will be not handled by the module.
  * Removing fields from the definition doesn't delete the fields in oxorder
  * The activation events works as well for the built-in fields as for custom fields.
  
## Screenshots ##

tbd ...