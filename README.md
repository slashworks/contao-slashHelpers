# contao-slashHelpers #

As set of helpers to minimize repeating tasks.

## List of helpers ##

### Assets ###

Add CSS and JS files to the <head>

#### addCSS ####

- @param (string) Path to the css file
- @param (boolen) optional combine with contao css file or not

```php
\SlashHelper\HelperAssets::addCSS('path/to/my/css/style.css');
```

#### addJS ####

- @param (string) Path to the javascript file
- @param (boolen) optional combine with contao js file or not

```php
\SlashHelper\HelperAssets::addJS('path/to/my/js/style.js');
```

### Dca ###

Helper to simplyfy dca operations


#### addFields ####
Add new fields to a dca

- @param (array) Array with dca fields 

```php

\SlashHelper\HelperDca::table('tl_content')

->addFields
(
  array
  (
		'subHeadline' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['subHeadline'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
  )
);

```


#### extendPalette ####
Extend an existing palette

- @param (string) name of the palette
- @param (string) new items to set
- @param (string) optional - define where the new items should be inserted. If you leave this option blank the string would automaticlly add to the end of the existing palette string

```php

\SlashHelper\HelperDca::table('tl_content')
->extendPalette
(
  'text',
  'subHeadline',
  'headline'
)

->addFields
(
  array
  (
		'subHeadline' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['subHeadline'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
  )
);

```
#### addPalette ####
add a new palette to dca item

- @param (string) name of the palette or of a blueprint (like cebasic)
- @param (string) new palette items as string

```php

\SlashHelper\HelperDca::table('tl_content')
->addPalette
(
  'textWithSubline',
  '{type_legend},type,headline,subHeadline;{text_legend},text;{image_legend},addImage;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop''
)

->addFields
(
  array
  (
		'subHeadline' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['subHeadline'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
  )
);

```


### File ###

#### getPath ####

Get a filepath by id.

- @param (integer) 

```php
\SlashHelper\HelperFile::getPath(20);
```


### Template ###

#### mootools ####

Generate a mootools template.

- @param (string) define the template name
- @param (array) add template vars

```php
\SlashHelper\HelperTemplate::mootools('moo_myTpl', array(
	"tplvar1" => 'A nice template var',
	"tplvar2" => 'Another nice template var',
));
```

#### wildcard ####

Generate a backend wildcard template.

- @param (string) add a text for the wildcard between ### HERE ###
- @param (string) optional add a title to the wildcard template

```php
\SlashHelper\HelperTemplate::wildcard('My Awesome Backend Wildcard Text', 'A optional title');
```

### Url ###

#### fromPageId ####

Get a frontend url by the page id

- @param (int) page id

```php
\SlashHelper\HelperUrl::fromPageId(3);
```
