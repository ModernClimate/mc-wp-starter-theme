# ACF Utility Functions
Advanced Custom Fields comes with a number of [built in functions](https://www.advancedcustomfields.com/resources/)
to retrieve ACF data. Commonly used functions include `get_field()`, `get_fields()`, and `get_sub_field()`. These
functions are convenient but significantly increase database queries compared to WP core functions and should not
be used. Check out [this article](https://www.billerickson.net/advanced-custom-fields-frontend-dependency/) for
more info.

Fortunately the MC Wordpress Starter Theme comes with some handy utilities to avoid the ACF function overhead.

**Location**<br/>
`/App/Fields/ACF.php`

### `getPostMeta()`
Used to retrieve ACF values from the database the preferred way.

**Example**<br/>
`$post_meta = ACF::getPostMeta(get_the_ID());`

### `getField()`
Utility function to check field key and avoid PHP errors

**Example**<br/>
`$heading = ACF::getField('heading', $your_flat_acf_data);`

### `getRowsLayout()`
Loops through Flexible Modules or Repeater Fields and compiles a multidimensional array.

**Example**<br/>
`$links = ACF::getRowsLayout('links', $your_flat_acf_data);`

### `getAttachmentByID()`
Used to return an image array based on the ACF image ID.

**Location**<br/>
`/App/Media.php`

**Example**<br/>
`$background_image = Media::getAttachmentByID(ACF::getField('background_image', $your_flat_acf_data));`
