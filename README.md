# TextBlocks plugin for CakePHP

> Note: This is a non-stable plugin for CakePHP 3.x at this time. It is currently under development and should be 
considered experimental.

## Installation

You can install this plugin into your CakePHP application using composer.

The recommended way to install composer packages is:

    composer require cakemanager/cakephp-textblocks
    
Now load the plugin with the command:

    $ bin/cake plugin load -r -b TextBlocks
    
Run the database migrations with:

    $ bin/cake migrations migrate --plugin TextBlocks
    
## Usage

### Register

Register new blocks with:

    Blox::register('my_block');
    
### Getting Content

You can get 2 types of contents: Title and Body.
Get your title this way...

    Blox::title('my_block');
    
And get your body this way:

    Blox::body('my_block');
    
Variables can be passed on both of the getters:

    // Imagine that the body of 'my_block' is: "Good morning, :name"

    Blox::body('my_block', [
        'name' => 'Leonardo'
    ]);
    
    // Output will be: "Good morning, Leonardo"
    
### Management

The Blocks can be managed by the [CakeAdmin](https://github.com/cakemanager/cakephp-cakeadmin) plugin, or you can create 
CRUD yourself.
    