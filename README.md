# Mou

![Mou icon](http://mouapp.com/Mou_128.png)

## Overview

**Mou**, the missing Markdown editor for *web developers*.

### Syntax

#### Strong and Emphasize 

**strong** or __strong__ ( Cmd + B )

*emphasize* or _emphasize_ ( Cmd + I )

**Sometimes I want a lot of text to be bold.
Like, seriously, a _LOT_ of text**

#### Blockquotes

> Right angle brackets &gt; are used for block quotes.

#### Links and Email

An email <example@example.com> link.

Simple inline link <http://chenluois.com>, another inline link [Smaller](http://smallerapp.com), one more inline link with title [Resize](http://resizesafari.com "a Safari extension").

A [reference style][id] link. Input id, then anywhere in the doc, define the link with corresponding id:

[id]: http://mouapp.com "Markdown editor on Mac OS X"

Titles ( or called tool tips ) in the links are optional.

#### Images

An inline image ![Smaller icon](http://smallerapp.com/favicon.ico "Title here"), title is optional.

A ![Resize icon][2] reference style image.

[2]: http://resizesafari.com/favicon.ico "Title"

#### Inline code and Block code

Inline code are surround by `backtick` key. To create a block code:

	Indent each line by at least 1 tab, or 4 spaces.
    var Mou = exactlyTheAppIwant; 

####  Ordered Lists

Ordered lists are created using "1." + Space:

1. Ordered list item
2. Ordered list item
3. Ordered list item

#### Unordered Lists

Unordered list are created using "*" + Space:

* Unordered list item
* Unordered list item
* Unordered list item 

Or using "-" + Space:

- Unordered list item
- Unordered list item
- Unordered list item

#### Hard Linebreak

End a line with two or more spaces will create a hard linebreak, called `<br />` in HTML. ( Control + Return )  
Above line ended with 2 spaces.

#### Horizontal Rules

Three or more asterisks or dashes:

***

---

- - - -

#### Headers

Setext-style:

This is H1
==========

This is H2
----------

atx-style:

# This is H1
## This is H2
### This is H3
#### This is H4
##### This is H5
###### This is H6


### Extra Syntax

#### Strikethrough

Wrap with 2 tilde characters:

~~Strikethrough~~


#### Fenced Code Blocks

Start with a line containing 3 or more backticks, and ends with the first line with the same number of backticks:

```
Fenced code blocks are like Stardard Markdown’s regular code
blocks, except that they’re not indented and instead rely on
a start and end fence lines to delimit the code block.
```

#### Tables

A simple table looks like this:

First Header | Second Header | Third Header
------------ | ------------- | ------------
Content Cell | Content Cell  | Content Cell
Content Cell | Content Cell  | Content Cell

If you wish, you can add a leading and tailing pipe to each line of the table:

| First Header | Second Header | Third Header |
| ------------ | ------------- | ------------ |
| Content Cell | Content Cell  | Content Cell |
| Content Cell | Content Cell  | Content Cell |

Specify alignement for each column by adding colons to separator lines:

First Header | Second Header | Third Header
:----------- | :-----------: | -----------:
Left         | Center        | Right
Left         | Center        | Right


### Shortcuts

#### View

* Toggle live preview: Shift + Cmd + I
* Left/Right = 1/1: Cmd + 0
* Left/Right = 3/1: Cmd + +
* Left/Right = 1/3: Cmd + -
* Toggle Writing orientation: Cmd + L
* Toggle fullscreen: Control + Cmd + F

#### Actions

* Copy HTML: Option + Cmd + C
* Strong: Select text, Cmd + B
* Emphasize: Select text, Cmd + I
* Inline Code: Select text, Cmd + K
* Strikethrough: Select text, Cmd + U
* List: Select lines, Control + L
* Link: Select text, Control + Shift + L
* Image: Select text, Control + Shift + I
* Uppercase: Select text, Control + U
* Lowercase: Select text, Control + Shift + U
* Titlecase: Select text, Control + Option + U
* Spaces to Tabs: Control + [
* Tabs to Spaces: Control + ]
* Select Word: Control + Option + W
* Select Line: Shift + Cmd + L
* Select All: Cmd + A
* Deselect All: Cmd + D
* Insert entity <: Control + Shift + ,
* Insert entity >: Control + Shift + .
* Insert entity &: Control + Shift + 7
* Insert entity Space: Control + Shift + Space
* Shift Line Left: Select lines, Cmd + [
* Shift Line Right: Select lines, Cmd + ]
* New Line: Cmd + Return
* Comment: Cmd + /
* Hard Linebreak: Control + Return

#### Edit

* Auto complete current word: Esc
* Find: Cmd + F
* Close find bar: Esc

#### Export

* Export HTML: Option + Cmd + E
* Export PDF:  Option + Cmd + P


### And more?

Don't forget to check Preferences, lots of useful options are there. You can Disable/enable **Show Live Preview** in new documents, Disable/enable **Auto pair**, **Make links clickable in Editor view**, change **Base Font**, choose another **Theme** or create your own!

Follow [@chenluois](http://twitter.com/chenluois) on Twitter for the latest news.

For feedback, use the menu `Help` - `Send Feedback`This little behavior takes care of uploading your files to the Rackspace Files Cloud

## Installation

### Clone

Clone from github: in your plugin directory type git clone https://github.com/Hyra/cloudfiles.git cloudfiles

### Submodule

Add as Git submodule: in your plugin directory type git submodule add https://github.com/Hyra/cloudfiles.git cloudfiles

### Manual

Download as archive from github and extract to app/plugins/cloudfiles

### Usage

In the model where you are uploading files attach the behavior and include your credentials:

	var $actsAs = array(
		'Cloudfiles.Cloudfiles' => array(
			'file_video' => array(
				'username'  => 'YOUR_USERNAME',
				'key'       => 'YOUR_APIKEY',
				'container' => 'THE_CONTAINER_YOU_WANT_TO_USE',
			)
		)
	);
	
## Extra options

By default, Rackspace Cloud works with the US server-clusters, if your Cloud File cluster is in the UK, specify this by adding the location parameter:
	
	var $actsAs = array(
		'Cloudfiles.Cloudfiles' => array(
			'file_video' => array(
				'username'  => 'YOUR_USERNAME',
				'key'       => 'YOUR_APIKEY',
				'container' => 'THE_CONTAINER_YOU_WANT_TO_USE',
				'location'  => 'UK', // THIS ONE
			)
		)
	);
	
If you want to validate for certain extensions, you can specify them as well:
	
	var $actsAs = array(
		'Cloudfiles.Cloudfiles' => array(
			'file_video' => array(
				'username'  => 'YOUR_USERNAME',
				'key'       => 'YOUR_APIKEY',
				'container' => 'THE_CONTAINER_YOU_WANT_TO_USE',
				'allowedExt'  => array('.m4v'), // THIS ONE
			)
		)
	);

## TODO

If I have time I will probably add more validation rules, but obviously I can handle pull requests as well ;)

