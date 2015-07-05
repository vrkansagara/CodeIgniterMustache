# CodeIgniterMustache
A Mustache implementation in CodeIgniter.  http://mustache.github.io/

    Copy Past `Mustache` folder in application/library/

    Make Mustache autoloading 
        open application/config/autoload.php and add $autoload ['libraries'] = array ('Mustache');
that's it.

Now change your view rendering from $this->load->view() to $this->mustache->view().

#### Mustache Variable supporting in view as bellow
{{site.url}} print site url equivalent to base_path() in php
{{site.name}} print project name
{{{form.open}}} print form tag in html
{{{form.validation.errors}}} print form errors in html



####This list is on going for improvement.


