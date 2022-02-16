# Basic Templating Engine

Create a web page that allows a user to test a simple templating language. The page should include:
- A text box for template input
- A text box for data input in Yaml
- An area to display the output
- A button to run the templating engine using the user's input, then display the result in the output area

The templating language needs only 2 features:

- string interpolation
  Example, given the template string "Hello {{name}}"  and the data "name: User1", the output is "Hello User1"
  Data for these will always be strings.

- conditional blocks
  Example, given the template "It's {{#if isWeekday }}not {{#end}}the weekend!"  and the data "isWeekday: true", the output is "It's not the weekend!"
  Example, given the template "It's {{#if isWeekday }}not {{#end}}the weekend!"  and the data "isWeekday: false", the output is "It's the weekend!"

 Data for conditional blocks will always be booleans.

 - Asset images folder shows how the screen will look.
