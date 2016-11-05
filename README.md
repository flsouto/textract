# textract

## Overview

This command line tool allows you to extract multiline comments from php source files producing a string with all matched comments. This will not extract doc blocks, only texts between /* and */.

## Installation

Either clone this repo or use composer:

```
composer require flsouto/textract
```

For convenience I recommend you create an alias to the "process" script:

```
alias textract='php /path/to/flsouto/textract/process.php'
```

## Usage

Say we have created two scripts containing multiline comments:

source1.php:

```php
<?php

/*
This line and
this other line
must be extracted
*/
function test(){
	return '';
}

/* 
This line should also be extracted
*/
```

source2.php:
```php
<?php

/*
More text from source2
*/
```

Now, if we run textract from the command line:

```
textract source1.php source2.php
```

We get this output:

```
This line and
this other line
must be extracted

This line should also be extracted

More text from source2
```

Instead, we could write:

```
textract source1.php source2.php > output.md
```

And we would have the output saved to the output.md file.

# Final thoughts

I use this utility for producing documentations out of the source code itself because I think it speeds up the process a lot. Also, if you are interested in this kind of thing, you should take a look at this other utility I created which allows you to extract snippets from your source code, execute them, and paste both the snippet and output in your markdown documentation: [markdown-x](https://github.com/flsouto/mdx)
