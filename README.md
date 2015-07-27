# Magento 301 Redirect by Optimiseweb V 0.3.2


- **Version number**: 0.3.2 
- **Stability**: Stable
- **Compatibility**: 1.5, 1.6, 1.6.1, 1.6.2.0, 1.7, 1.8, 1.8.1, 1.9
- **Build Date**: 2015-06-19 09:07:25

## Overview
This is a clone of the excellent magento module located at [http://www.magentocommerce.com/magento-connect/optimise-web-s-mass-301-redirects-for-404-pages.html](Magento Connect) Set up bulk 301 redirects for 404 pages by uploading the URL data in a CSV file. No HTACCESS or DB changes!

Optimise Web's Bulk Redirects extension for Magento allows you to upload all your redirect data as a CSV file. This module is purely CSV file based (doesn't touch the database). Consider this as an alternative to adding 301 redirects into the .htaccess file.

## Installation
Install using modgit: 
`modgit add mage-mod-301-redirect-optimiseweb https://github.com/flintdigital/mage-301-redirect-optimiseweb.git`

# Usage

## Optimise Web's Mass 301 Redirects for 404 Pages

### Mass / Bulk Redirects (301, 302, or any status) for Magento 404 Pages

Magento has an internal URL Rewrite Management system. Magento can automatically add redirects for new and changed categories and products. However, it can be a laborious task to add all your custom redirects and/or redirects from an old website, one by one.

### **<u>How does this module work?</u>**

Optimise Web's Bulk Redirects extension for Magento allows you to upload all your redirect data as a CSV file. This module is **purely CSV file based <u>(doesn't touch the database)</u>**. Consider this as an alternative to adding 301 redirects into the .htaccess file.

When a missing URL is requested, Magento's routing system will first look within its database table for available rewrites. If Magento cannot find a suitable redirect, it will present your visitor with a 404 error page. This redirect module is set to work between Magento's internal check and the 404 page. When Magento cannot find a suitable redirect, this module will try and find one. If this module cannot find a matching redirect, the visitor will then be sent to the 404 page.

There are three methods of redirects that are available. They all work one after the other. The module implements a **<u>Best Match</u>** approach. If a matching redirect is found in the first method, Magento uses it and doesn't look at the rest of the CSV file or the remaining methods.

### Method 1 - Legacy

I called this Legacy as it was the first option I wrote for this module. Many Magento retailers still use this option. I did not want their websites to stop working. So it is still here.

**CSV Format:**  
 http://www.oldurl.com/oldpath;http://www.newurl.com/newpath   
Notice the semicolon. In the past, this module used a semicolon to separate the URLs. Please note that this option uses just a single cell of the CSV file in Excel.   
A sample file is available here http://optimiseweb.co.uk/magento-modules/1-Legacy.csv

### Method 2 - Redirects System v1.0

Many retailers were struggling with the semicolon and single cell based redirects. So, I made this into a three cell redirect.

**CSV Format:**   
http://www.oldurl.com/oldpath,http://www.newurl.com/newpath,status_code   
Notice the comma as a separator. I have now given an option for you to customise the delimiter / separator. Excel saves the CSV using commas. However, you can choose to use any character, even a pipe delimiter.   
The status_code will be 301 or 302\. Now this version on, you can define the status code (required for the redirects to work) as well.   
Another big improvement to this module is the wildcard character. You can define a wildcard character in the options screen and use it in the CSV file.   
e.g. http://www.oldurl.com/oldpath/*,http://www.newurl.com/newpath/newsublevel,301   
This will match URL that follows http://www.oldurl.com/oldpath/ and redirect them all to http://www.newurl.com/newpath/newsublevel.   
A sample file is available here http://optimiseweb.co.uk/magento-modules/2-Redirects.v1.0.csv

### Method 2 - Query String Based Redirects

The query string based option was developed primarily for retailers moving away from old school ecommerce platforms that used query strings in their URLs. It can also be used by existing Magento retailers who have deleted a product attribute, stopped a Google Adwords campaign, etc.

**CSV Format:**   
http://www.oldurl.com/oldbasepath,prod_id,170,http://www.newurl.com/newproducturl,status_code   
The settings, delimiter, wildcard options are similar to Method 2.   
The second column is the query string name and the third column is the query string value.   
e.g. http://www.oldurl.com/oldbasepath,prod_id,170,http://www.newurl.com/newproducturl,301   
This will match all of the following   
http://www.oldurl.com/oldbasepath?prod_id=170   
http://www.oldurl.com/oldbasepath?cat_id=24&prod_id=170   
http://www.oldurl.com/oldbasepath?prod_id=170&cat_id=24   
Please Note: This module works on a best match basis. If you had a redirect setup for the cat_id query before the prod_id query, both the above URLs will redirect to the category page. This is because cat_id is the best match. If you setup prod_id before cat_id, then the product page would take priority. It is very rare that old ecommerce systems will call both the category id and product id in the same URL. However, I am just illustrating the best match scenario.   
A sample file is available here http://optimiseweb.co.uk/magento-modules/3-QueryStringBasedRedirects.csv

### **<u>PLEASE READ THIS</u>**

- This module is widely tested and works on most standard Magento setups.  
 - If the module isn't working for you, you have most likely not followed the standard Magento module installation routine. Read the FAQs below.  
 - Before leaving negative feedback or writing an email to us, please check the following - **Turn Off Compilation Before Installation, Clear Cache After Installation, Log Off and Log Back Into the Admin**  
 - 99% of the time, when users install the module and it doesn't work, we investigate and find out that there are other problems (server issues, file and folder permissions, conflicting modules, etc.).  
 - Please note that this is a very useful, but free module. We cannot be doing email ping pong all day long. If you need us to look into a problem, send us a private message with your Magento admin (with full access rights) password and FTP details. Without this we will have to embark on a email ping pong and that takes a lot of time. We hope you will understand.  
 - Thank you very much for taking time to use our module.  

### **<u>Features</u>**

- If you disable a product in Magento and add a redirect for that product via this module, the redirect will not work as according to Magento the product is still in the system. You will have to delete the product for the redirect to work. I'll look into finding a work around for this.  

**Download and Upload of CSV**   
- Using the system configuration panel. **System > Configuration > Optimise Web (tab) > Mass 301 Redirects**  
 - Always remember to download the previously uploaded CSV and add new redirects to it. Uploading a new CSV will overwrite the old CSV and you will lose all previously uploaded 301 redirects.  

### **<u>Frequently asked questions</u>**

**1\. Why am I not seeing the system settings? Why am I getting a 404 error?**

As with the installation of all Magento modules, please clear the cache folders and log out of the admin area and log back in. Please also flush your CSS and JS caches - just to be sure.

**2\. Should I backup Magento's files and database?**

This module does not add or make database changes during the install process. But yes, please make it a point to backup your files and database before installing or upgrading any Magento module.

**3\. Will the module work with compilation turned on?**

Yes. Still, make sure you disable compilation when installing the module. You can turn on compilation after installation and clearing the cache folders.

**4\. Do you offer support for this extension?**

This is a free extension and support will be limited. We have placed a support link on the settings page of the module. Please write to us and we'll do our best to help you out.

### **<u>Important:</u>**

To be able to develop the module further and provide better support, we capture your Magento version, module version, admin URL and admin email address when you access the admin > module settings page. We do not share this data with anyone. We do not use this data to send you marketing communication. We do this purely for support and statistical purposes.

If you do not agree to this, please do not install the module. Or, write to us to request a bespoke version of the module.
