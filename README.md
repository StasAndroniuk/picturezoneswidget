# picturezoneswidget
Plugin for wordpress, that can divide picture on areas and  highlight this areas when mouse is hover it
To use this plugin you have to include jquery library in admin panel of your website

You can add your picture with areas to the widget, put every where on you website. 
1. Install widget. copy files to wp-content/plugins. Then install it in admin panel.
2. Add widget to your website.
3. In field picture address, put address to your picture
4. Press Settings, and add areas that you want to highlight.
  Name of area should be unique for every area, BUT of you want to highlight few areas in one time, you have to give them names that
  have similar partslike: zone1,zone2 or backdoor1, backdoor2
5. Add area code.  You can use service https://www.image-map.net/ or similar to generate area code and put it to plugin
Example:  <area id=""  target="" alt="door" title="door" href="" coords="287,433,222,374,194,348,163,313,141,293,120,248,106,214,102,183,108,161,121,148,148,185,183,220,210,244,233,268,266,301,280,312,291,318,282,347,285,384" shape="poly">
! Important: Attribute id have to be in the code, and to be empty.
6. Press save and enjoy
