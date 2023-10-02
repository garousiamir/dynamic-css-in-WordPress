# Dynamic CSS in WordPress
This repo is for WordPress developers who want to output dynamic CSS of their themes or plugins as external CSS and not internal inline CSS 

![dynami_css](https://github.com/garousiamir/dynamic-css-in-WordPress/blob/main/readme_dcss.jpg?raw=true)


### How to use it?
1. First of all, you need to download this repo using **git clone** or **manual download** and put it somewhere in your theme. 
2. Require the file to load the dynamic CSS loader class, Example Bellow:

```
 require_once get_template_directory() . '.../path/to/ag-dynamic-css.php';
```
3. Now create a file named **custom.css.php** in the root directory of your theme. Now open the **custom.css.php** and put your dynamic CSS.

   For example imagine that I have a dynamic css from my theme options like this: $color= $options['opt-color-5'];
   with this example in mind inside my **custom.css.php** would be something like bellow:

   ```
   // ... this code is just an example ...
   .nav-responsive-content .discounts-contact .discount {
    color: <?php echo $color;  ?> ;
    }
    .nav-responsive-content-menu li.has-child > .children .heading {
        color: <?php echo $color;  ?> ;
    }
    // ... rest of your css goes here ...
   ```
4. If you have followd the steps correctly you can see the custom.css is rendering in your front end just like other css files.
   
   
