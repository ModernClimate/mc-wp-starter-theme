# ACF Field Registration
Register advanced custom fields with object oriented PHP using the Extended ACF Plugin. 

Visit the [Extended ACF github README](https://github.com/wordplate/extended-acf) for a full list of field examples and documentation.

## **Field Names**
By default, the field name is created by sanitizing the title (all lowercase and spaces replaced with dashes). If you prefer to name it something different, this can be added as a second argument to the `make` method for any field.

## **Examples**
_Note: Use statements must be added for every class (field) used._

**Basic Fields**
```php
Text::make(__('Headline', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->required();
```

```php
Textarea::make(__('Content', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->rows(2);
```

```php
Wysiwyg::make(__('Content', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->mediaUpload(false)
    ->required();
```

```php
Url::make(__('Url', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->required();
```

```php
ColorPicker::make(__('Color', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->defaultValue('#4a9cff')
    ->required();
```

```php
Image::make(__('Image', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->returnFormat('array')
    ->previewSize('thumbnail') // thumbnail, medium or large
    ->required();
```

```php
Select::make(__('Select', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->choices([
        'choice-1' => __('Choice 1', 'mc-starter'),
        'choice-2' => __('Choice 2', 'mc-starter'),
    ])
    ->defaultValue('choice-1')
    ->returnFormat('value') // value, label or array
    ->allowMultiple()
    ->required();
```

```php
TrueFalse::make(__('True or False', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->defaultValue(false)
    ->stylisedUi() // optinal on and off text labels
    ->required();
```

**Group**
```php
Group::make(__('Group', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->fields([
        Text::make(__('Text', 'mc-starter')),
        Image::make(__('Image', 'mc-starter')),
    ])
    ->layout('row')
    ->required();
```

**Repeater**
```php
Repeater::make(__('Repeater', 'mc-starter'))
    ->instructions(__('Instructions go here.', 'mc-starter'))
    ->fields([
        Text::make(__('Text', 'mc-starter')),
        Image::make(__('Image', 'mc-starter')),
    ])
    ->min(2)
    ->collapsed('name')
    ->buttonLabel(__('Add Component', 'mc-starter'))
    ->layout('table') // block, row or table
    ->required();
```

**Conditional Logic**
```php
Select::make(__('Select', 'mc-starter'))
    ->choices([
        'choice-1' => __('Choice 1', 'mc-starter'),
        'choice-2' => __('Choice 2', 'mc-starter'),
    ]),
Text::make(__('Text', 'mc-starter'))
    ->conditionalLogic([
        ConditionalLogic::if('select')->equals('choice-1')
    ]);
```