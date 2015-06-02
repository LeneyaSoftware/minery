# Minery (WIP)
### The PHP Framework For Rendering Reports

Minery is a PHP Framework for writing reports. The goal is to have a Framework where you can plug in a keyed array similar to what you get when processing MySQL results, and have the Framework render whatever it is you like. Whether that is a table, chart, or any other display type, Minery aims to make this process much easier and flexible. 

##Roadmap 

1. Create the base framework classes.
2. Create a way to persist the report and display it using JSON. 
3. Create Adapters to take a Report Result Set and format the data in a way that JS will understand (DataTables, Flot, etc...)
4. Create Javascript classes that wrap DataTables, Flot, and any other javascript reporting tools that will automatically update reports using AJAX and filters.
5. Create a Javascript class to translate JSON representations of reports into the display type chosen. 


There is still a bunch more to do. If you'd like to contribute, email josh.walker [AT] leneya [DOT] com
